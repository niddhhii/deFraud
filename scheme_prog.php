<script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.34/dist/web3.min.js"></script>

<script>
    let senderId, receiverId, schemeId, receiver1, receiver2, receiver3, contract, newLen, balance;

    function startApp() {
		let abi=[{"constant":false,"inputs":[{"internalType":"address","name":"_receiver","type":"address"},{"internalType":"uint256","name":"_amount","type":"uint256"},{"internalType":"string","name":"_scheme","type":"string"}],"name":"transferFunds","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"inputs":[],"payable":false,"stateMutability":"nonpayable","type":"constructor"},{"constant":true,"inputs":[{"internalType":"address","name":"_owner","type":"address"}],"name":"balanceOf","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"getLength","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"internalType":"string","name":"_owner","type":"string"}],"name":"hash","outputs":[{"internalType":"address","name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"internalType":"uint256","name":"","type":"uint256"}],"name":"transactions","outputs":[{"internalType":"address","name":"sender","type":"address"},{"internalType":"address","name":"receiver","type":"address"},{"internalType":"string","name":"scheme","type":"string"},{"internalType":"uint256","name":"amount","type":"uint256"},{"internalType":"uint256","name":"timestamp","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"internalType":"address","name":"_owner","type":"address"}],"name":"uname","outputs":[{"internalType":"string","name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"}];
        let fundsAddress = "0x9F2203Be246a2eF67a79a95AB589D4968B4a9B6B";
        let web3 = new Web3('http://localhost:8545');
        contract = new web3.eth.Contract(abi, fundsAddress);
        senderId = "0xCca7560Aa7362F49F3E3bA3CC6f248f6d34900Ee";
        newLen = 0;
        schemeId = "Universal Health Insurance Scheme";

    }
    startApp();
    function timeConverter(unixTimestamp) {
        var options = { day: '2-digit', month: 'numeric', year: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
        var dateObj = new Date(unixTimestamp * 1000);
        return dateObj.toLocaleString('en-IN', options).replace(/,/g, "");
    }
    function hashToName(address) {
        if(address==="0xCca7560Aa7362F49F3E3bA3CC6f248f6d34900Ee"){
			return "ramu";
        }else if(address==="0x96aFC09b5b54c083E3B0Bf2bDe4A62cfD6c10508"){
			return "kaybee";
        }else if(address==="0x0938Bc0ff38CE4ae11FdA2b42AcB6Ca768668170"){
			return "nidhi";
        }else{
			return "hunain";
        }
    }

    contract.methods.getLength().call().then(function (length) {
        var i = 0;
        let csv = new Array(length);
        for (let j = 0; j < csv.length; j++) {
            csv[j] = new Array(5);
        }
        for (let transid = 0, p = Promise.resolve(); transid < length; transid++) {
            p = p.then(_ => new Promise(resolve =>
                contract.methods.transactions(transid).call().then(function (trans) {
                    if (trans) {
                        csv[i]=[timeConverter(trans.timestamp), hashToName(trans.sender), hashToName(trans.receiver), trans.scheme, trans.amount];
                        console.log(csv[i]);
                        i++;
                        resolve();
                    }
                })
            ));
        }
        let callCsv = setInterval(checkCsv, 1000);
        console.log(i);

        function checkCsv() {
            if (i === length) {
                clearInterval(callCsv);
                callProgress(csv);
            }
        }
    });

    function callProgress(csv) {
        console.log(1);
        for (let i = 0; i < csv.length; i++) {
            for (let j = 0; j < 5; j++)    {
                console.log(csv[i][j] + " ");
            }
            // console.log("<br>");
        }
    }
</script>

