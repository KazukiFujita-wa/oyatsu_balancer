document.addEventListener("DOMContentLoaded", async () => {
  const list = document.getElementById("resultList");
  const totalEl = document.getElementById("total");
  const retryBtn = document.getElementById("retryBtn");

  try {
    // 🔹 DB（Laravel API）からお菓子一覧を取得
    const res = await fetch("/api/snacks");
    const snacks = await res.json();

    // 🔹 localStorageから抽選条件を取得
    const budget = parseInt(localStorage.getItem("budget")) || 500;
    const balance = parseInt(localStorage.getItem("balance")) || 5;

    // 🔹 DBデータからランダム選択（ロジックはフロント側で）
    const selected = selectSnacks(snacks, budget, balance);

    // 🔹 合計金額を算出
    const total = selected.reduce((sum, s) => sum + s.price, 0);
    const remaining = budget - total;

    // 🔹 表示処理
    list.innerHTML = selected.map(s => `
      <div class="snack-item">
        <img src="assets/images/${s.image}" alt="${s.name}">
        <h3>${s.name}</h3>
        <p>価格: ¥${s.price} / 味: ${s.taste === "sweet" ? "甘い" : "しょっぱい"}</p>
      </div>
    `).join("");

    totalEl.textContent = `合計: ¥${total}（残り ¥${remaining}）`;

  } catch (error) {
    console.error("APIエラー:", error);
    list.innerHTML = "<p>データの取得に失敗しました。</p>";
  }

  // 🔁 再抽選ボタン
  retryBtn.addEventListener("click", () => {
    location.href = "index.html";
  });
});

function selectSnacks(snacks, budget, balance) {
  const sweetRatio = (10 - balance) / 10;
  const saltyRatio = balance / 10;

  const sweetSnacks = snacks.filter(s => s.taste === "sweet");
  const saltySnacks = snacks.filter(s => s.taste === "salty");

  const selected = [];
  let total = 0;

  while (total < budget) {
    const pickList = Math.random() < sweetRatio ? sweetSnacks : saltySnacks;
    const randomSnack = pickList[Math.floor(Math.random() * pickList.length)];

    if (randomSnack && total + randomSnack.price <= budget) {
      selected.push(randomSnack);
      total += randomSnack.price;
    } else {
      break;
    }
  }

  return selected;
}
