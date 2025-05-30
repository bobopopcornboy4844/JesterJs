const div = document.getElementById("#home").getElementById("news")

const newsF = await fetch("NEWS.txt")
const news = await newsF.text()
div.innerHTML = news