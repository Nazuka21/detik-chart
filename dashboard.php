<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DETIK CHART</title>
  <script src="auth.js" defer></script>
  <script src="https://s3.tradingview.com/tv.js"></script>
  <style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      display: flex;
      flex-direction: column;
      background-color: #000;
      color: white;
      font-family: Arial, sans-serif;
    }
    #tv_chart_container {
      flex: 1;
    }
    #menuToggle {
      position: fixed;
      bottom: 80px;
      left: 10px;
      background-color: #333;
      padding: 10px 15px;
      border-radius: 5px;
      color: white;
      cursor: pointer;
      z-index: 999;
    }
    #controls {
      display: none;
      width: 100%;
      background-color: rgba(51, 51, 51, 0.95);
      padding: 10px;
      text-align: center;
      z-index: 998;
    }
    #controls label, #controls select {
      margin: 5px 10px;
      font-size: 16px;
    }
    #watermark {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 58px;
      font-weight: bold;
      color: rgba(255, 255, 255, 0.1);
      pointer-events: none;
      z-index: 500;
    }
  </style>
</head>
<body>

  <div id="tv_chart_container"></div>

  <div id="menuToggle">Menu</div>

  <div id="controls">
    <label for="assetSelect">Pilih Aset:</label>
    <select id="assetSelect">
      <optgroup label="Crypto">
        <option value="CRYPTO:BTCUSD">Bitcoin (BTC)</option>
        <option value="CRYPTO:ETHUSD">Ethereum (ETH)</option>
        <option value="CRYPTO:DOGEUSD">Dogecoin (DOGE)</option>
        <option value="CRYPTO:BNBUSD">BNB (BNB)</option>
        <option value="CRYPTO:SHIBUSD">SHIBA INU</option>
      </optgroup>
      <optgroup label="Saham IDX">
        <option value="IDX:BBRI">Bank BRI (BBRI)</option>
        <option value="IDX:BBCA">Bank BCA (BBCA)</option>
        <option value="IDX:BMRI">Bank Mandiri (BMRI)</option>
        <option value="IDX:TLKM">Telkom (TLKM)</option>
        <option value="IDX:UNVR">Unilever (UNVR)</option>
      </optgroup>
    </select>
  </div>

  <div id="watermark">DETIK CHART</div>

  <script>
    let widget;
    let currentSymbol = "CRYPTO:BTCUSD";
    let currentInterval = "1";

    function createChart(symbol) {
      if (document.getElementById("tv_chart_container").firstChild) {
        document.getElementById("tv_chart_container").innerHTML = "";
      }

      widget = new TradingView.widget({
        autosize: true,
        container_id: "tv_chart_container",
        symbol: symbol,
        interval: currentInterval,
        timezone: "Asia/Jakarta",
        theme: "dark",
        style: "1",
        locale: "id",
        backgroundColor: "#000000",
        gridColor: "#111111",
        allow_symbol_change: true,
        save_image: false,
        hide_volume: true,
        studies: [
          "STD;MACD",
          "PUB;0d217303fbcb4fcea8c2575ce82604f8"
        ],
        support_host: "https://www.tradingview.com"
      });

      currentSymbol = symbol;
    }

    // Inisialisasi pertama
    createChart(currentSymbol);

    // Toggle menu
    document.getElementById("menuToggle").onclick = function () {
      const controls = document.getElementById("controls");
      controls.style.display = controls.style.display === "block" ? "none" : "block";
    };

    // Ganti simbol chart
    document.getElementById("assetSelect").onchange = function () {
      const newSymbol = this.value;
      createChart(newSymbol);
    };
  </script>
</body>

<footer style="text-align: center; color: white; padding: 10px;">
  Powered DETIK CHART by Bogen
</footer>
</html>
