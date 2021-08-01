const svg_supported = () => {
    let supported = false;
    let html_tag = document.getElementsByTagName("html")[0];
    if (html_tag.classList) {
        if (html_tag.classList.contains("svg") && html_tag.classList.contains("svgasimg")) {
            supported = true;
        }
    } else {
        let classes = html_tag.className.split(' ');

        if(classes.indexOf('svgasimg') !== -1 && classes.indexOf('svgasimg') !== -1){
            supported = true;
        }
    }
    return supported;
}

export default svg_supported;