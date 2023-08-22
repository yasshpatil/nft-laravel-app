'use strict';

let ethereum = window.ethereum;
let currentAccount = null;
let isUnlocked = false;
let convertToETH= 1000000000000000000;
let mode, balanceVal, contract, nftContract, tokenURI;
const WALLETDOWNLOADURL= 'https://metamask.io/download/'
const web3 = AlchemyWeb3.createAlchemyWeb3(API_URL);

$(window).on('load', function(){
  var abc = currentAccount??'';
  console.log('abv',abc);
  walletInstallOrNot();
  isUnlockedFunc();
  getcontractJson();
});

function getcontractJson(){
  console.log('getcontractJson', BASE_URL + "NFTBriks.json");
  $.getJSON(BASE_URL + "NFTBriks.json", function (result) {
    contract = result;
    nftContract = new web3.eth.Contract(contract.abi, CONTRACT_ADDRESS);
    console.log('contract', nftContract.options.address);
  });
}

function walletInstallOrNot(){
  if (typeof window.ethereum === 'undefined') {
    $("#metamaskbtnspan").html('Install MetaMask');
    document.getElementById("metamaskbtn").onclick = function() { walletActions('install'); }
    return false;
  }
  return true
}

function isUnlockedFunc(){
  if(ethereum != undefined){
    ethereum._metamask.isUnlocked().then(value => {
      isUnlocked= value;
    })
    if(isUnlocked == false && window.ethereum != undefined){
      enableWalletBtn();
    }
  }
  return isUnlocked;
}

function walletMode(){
  ethereum.request({ method: 'eth_chainId' }).then(function(chainId){
    if (chainId === '0x1') {
      console.log('Ethereum Main Network (Mainnet).');
    } else if (chainId === '0x3') {
        
        console.log('Ropsten Test Network.');
    } else if (chainId === '0x4') {
      
        console.log('Rinkeby Test Network.');
    } else if (chainId === '0x5') {
      
        console.log('Goerli Test Network.');
    } else {
        console.log('Kovan Test Network.');
    }
    mode = chainId;
   return mode;
  }).catch((error) => {
      console.error(error); 
  });
}

function enableWalletBtn(){
  if(document.getElementById('metamaskbtn') != null){
    document.getElementById('metamaskbtn').disabled = false;
    document.getElementById("metamaskbtn").onclick = function() { walletActions('connect'); }
  }else{
    connectWallet();
  }

}

function disableWalletBtn(){
  document.getElementById("metamaskbtn").setAttribute("disabled", "disabled");
}

function connectWallet(){
  ethereum.request({ method: 'eth_requestAccounts' }).then(handleAccountsChanged)
  .catch((error) => {
      if (error.code === 4001) {
        //enableWalletBtn();
        document.getElementById("metamaskbtnspan").innerHTML = 'Connect with MetaMask';
      } else {
        console.error(error);
      }
  });
} 

function walletActions(value){

  switch(value) {
    case 'install':
      window.open(WALLETDOWNLOADURL, '_blank');
      break;
    case 'connect':
      connectWallet();
      break;
  }

}

function handleAccountsChanged(accounts) {
  if (accounts.length === 0) {

    console.log('Please connect to MetaMask.');
    enableWalletBtn();
    if(document.getElementById("metamaskbtnspan") != null){
      document.getElementById("metamaskbtnspan").innerHTML = 'Connect with MetaMask';
    }
   

  } else if (accounts.length != 0) {
    currentAccount = accounts[0];
    console.log('handleAccountsChanged', currentAccount);
    getBalance();
    if(document.getElementById("metamaskbtnspan") != null){
      $("#tokenbtn").addClass("token-active");
      document.getElementById("metamaskbtnspan").innerHTML = 'Connected';
      $("#wallet_connect").hide();
      disableWalletBtn();
    }
  }
}

async function getBalance(){
  let params = [
    currentAccount,
    'latest'
 ]
  await ethereum.request({ method: 'eth_getBalance',params}).then(function(balance){
    balanceVal = parseInt(balance)/convertToETH;
    $("#wallet-balance-span").html(balanceVal+' ETH');
    $("#wallet-balance-span-sale").html(balanceVal+' ETH');
    if(balanceVal > 0){
      $("#tokenbtn").addClass('token-active');
    }
  }).catch((error) => {
    console.error(error);
  });
}

if(ethereum != undefined){
  ethereum.on('accountsChanged', handleAccountsChanged);
}

//ethereum.on('connect', handleAccountsChanged);
//ethereum.on('disconnect', handleAccountsChanged);

async function sendTransaction(token_url){
  isUnlockedFunc();
  let price = parseFloat(localStorage.getItem('tp'));
  if(balanceVal == undefined || currentAccount == null || isUnlocked == false){
    toastr.error("Please connect wallet correctly");
    return false;
  }

  if(balanceVal <= price){
    toastr.error("Your connected wallet balance is insufficient");
    return false;
  }

  tokenURI= token_url;
  jQuery('.loader2').show();
  console.log('sendTransaction', currentAccount);  
  let params = [{
    "from": currentAccount,
    "to": ADMIN_KEY,
    "gas": '0x76c0', // 30400
    "gasPrice": Number(0.00608*10000000000000).toString(16), // 10000000000000
    "value": Number(price*convertToETH).toString(16), // 2441406250
  }]
  console.log('sendTransaction', params);
  await ethereum.request({ method: 'eth_sendTransaction',params}).then(function(result){
      mintNFT();

  }).catch((error) => {
    console.error(error);
    jQuery('.loader2').hide();
  });
}

async function mintNFT() {  
   if(tokenURI == undefined){
    toastr.error("Metadata not available");
    jQuery('.loader2').hide();
    return false;
   }
   console.log('mintNFT', currentAccount);
    const tx = {
      "from": currentAccount,
      'to': CONTRACT_ADDRESS,
      'gas': 500000,
      "value": parseFloat(web3.utils.toWei('0.01', 'ether')),//10000000000000000,
      'maxPriorityFeePerGas': 1999999987,
      'data':  nftContract.methods.mintNFT(currentAccount, tokenURI).encodeABI()
    };
    console.log('tx', tx, 'tokenURI',  tokenURI);
    //step 4: Sign the transaction  
    const signedTx = await web3.eth.accounts.signTransaction(tx, PRIVATE_KEY);
    console.log('web3.eth.accounts.signTransaction', signedTx );
    const transactionReceipt = await web3.eth.sendSignedTransaction(signedTx.rawTransaction);
    console.log('web3.eth.sendSignedTransaction', transactionReceipt );
    let tokenId = web3.utils.hexToNumber(transactionReceipt.logs[0].topics[3]);
    // let tokenId = web3.utils.hexToNumber(transactionReceipt.transactionIndex);
    console.log('tokenId===', tokenId );
    saveTransactionParams(tokenId,transactionReceipt.transactionHash);
}

function saveTransactionParams(tokenId,txHash){
  let width = $("#quantity1").val();
  let height = $("#quantity2").val();
  let price = localStorage.getItem('tp');
  let totalBricks = localStorage.getItem('b').split(',').length;
  let parent_brick = localStorage.getItem('parent_brick');
  let style = $(parent_brick+" span").attr("style").replace(/width: |height: /ig, '').split(';');
  let brickWidth=style[0].trim().replace(/width:/ig, '');
  let brickHeight=style[1].trim().replace(/height:/ig, '');
  let bricks = localStorage.getItem('b');
  localStorage.removeItem('tp');
  localStorage.removeItem('b');
  localStorage.removeItem('parent_brick');
  let data = {price:price,token_id:tokenId,user_wallet:currentAccount,admin_wallet:ADMIN_KEY,total_bricks:totalBricks,txHash:txHash,bricks:bricks,width:brickWidth,height:brickHeight,single_box_width:eachBoxWidth,single_box_height:eachBoxHeight,bricks_width:width,bricks_height:height};
  console.log('saveTransactionParams', data);
  let saveTransactionRoute = route('boxes.createorder');
  saveTransaction(saveTransactionRoute,'POST',data,'transaction');
}

function saveTransaction(route,method,data={}){
  console.log('saveTransaction', route);
  $.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: route,
    data: data,
    type: method,
    cache: false,
    success: function (response) {
      jQuery('.loader2').hide();
      toastr.success(response.message);
      console.log(response.data.id);
      setTimeout(function(){
        window.location.href = BASE_URL + 'brickslist?show=' + response.data.id;
      },2000)
    },
    error: function (xhr, ajaxOptions, thrownError) {
      jQuery('.loader2').hide();
        errorMessage(xhr);
    }
  });
}

async function setTtokenURI(token_id, tokenURI) {
  console.log('setTtokenURI', token_id, tokenURI, currentAccount, '0xf4910c763ed4e47a585e2d34baa9a4b611ae448c');
  let abc = parseInt(token_id);
  // let bcd = await nftContract.methods.setTokenURI(abc, tokenURI);
  // console.log('bcd', bcd);
  await nftContract.methods.setTokenURI(abc, tokenURI).send({ 'from': currentAccount }).then(function(result){
    console.log('results', result);
    jQuery('.loader2').hide();
      toastr.success("Congratulation, you have successfully uploaded your NFT details on Opensea");
          setTimeout(function(){
              window.location.href = BASE_URL + 'brickslist';
          },2000)
   })
}