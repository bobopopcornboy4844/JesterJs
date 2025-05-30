const thumbnailWidth = 16*11
const thumbnailHeight = 9*11
const videoS = `border: 5px;border-color: black;height: ${thumbnailHeight + 10}px;width: ${thumbnailWidth}px;`
const thumbnailS = `width: ${thumbnailWidth}px;height: ${thumbnailHeight}px;`
function addVideo(img,title) {
    let add = `<div style='${videoS}'><img style='${thumbnailS}' src='${img}'><a>${title}</a></div>`
    document.body.innerHTML += add
}
addVideo("http://jesterjs.servehttp.com/images/GeometryDash.png",'test')