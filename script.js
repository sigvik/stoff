const elem = (id) => document.getElementById(id)

const hamburger = elem('hamburger')
const menuOverlay = elem('menu-overlay')
const menuOverlayBg = elem('menu-overlay-bg')
const menuExit = elem('menu-exit')

const menuOpen = () => menuOverlay.classList.add('active')
const menuClose = () => menuOverlay.classList.remove('active')

hamburger.onclick = () => menuOpen()
menuOverlayBg.onclick = () => menuClose()
menuExit.onclick = () => menuClose()