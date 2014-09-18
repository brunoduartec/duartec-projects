function fnRandom(iModifier) {
    return parseInt(Math.random() * iModifier);
}
function fnSetValues() {
    var iHeight = oForm.oHeight.options[
      oForm.oHeight.selectedIndex].text;
    if (iHeight.indexOf("Random") > -1) {
        iHeight = fnRandom(document.body.clientHeight);
    }
    var sFeatures = "dialogHeight: " + iHeight + "px;";
    return sFeatures;
}
function fnOpen() {
    var sFeatures = fnSetValues();
    window.showModalDialog("SMD_target.htm", "", sFeatures)
}
function modalWindow(itarget, iwidth, iheight) {
    var sFeatures = "dialogHeight: " + iheight + "px;dialogWidth: " + iwidth + "px;";
    window.showModalDialog(itarget, window, sFeatures);
}