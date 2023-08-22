// SPDX-License-Identifier: MIT
pragma solidity ^0.8.1;

import "@openzeppelin/contracts/token/ERC721/ERC721.sol";
import "@openzeppelin/contracts/utils/Counters.sol";
import "@openzeppelin/contracts/access/Ownable.sol";
import "@openzeppelin/contracts/token/ERC721/extensions/ERC721URIStorage.sol";

contract NFTBriks is ERC721URIStorage, Ownable {
    using Counters for Counters.Counter;

    Counters.Counter private _tokenIds;

    constructor() ERC721("NFT Briks", "NFTB") {}

    function setTokenURI(uint256 tokenId, string memory tokenURI) public {        
        _setTokenURI(tokenId, tokenURI);
    }

    function mintNFT(address recipient, string memory tokenURI)
        public virtual payable
        returns (uint256)
    {
        require(msg.value >= 10, "Not enough ETH sent; check price!"); 
        _tokenIds.increment();
        uint256 newItemId = _tokenIds.current();
        _mint(recipient, newItemId);
        _setTokenURI(newItemId, tokenURI);
        return newItemId;
    }
}