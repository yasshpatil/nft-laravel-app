async function main() {
    const MyNFT = await ethers.getContractFactory("NFTBriks")
  
    // Start deployment, returning a promise that resolves to a contract object
    const myNFT = await MyNFT.deploy()
    console.log("Contract deployed to address:", myNFT.address)
  }
  main()
    .then(() => process.exit(0))
    .catch((error) => {
      console.error(error)
      process.exit(1)
  })


  //0xDBF414ac6b4e23Ce942Ecb90f6eDa7154aa5a944 rinkeby
  // 0x383a04d847C1d2e76C645e0D88abc028cB8298ea  goerli

