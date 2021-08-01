window.addEventListener("load", () => {
    //Get the button:
    var scrollToTopBtn = document.getElementsByClassName("c-globals")[0].getElementsByClassName("c-scroll-to-top")[0];

    // When the user scrolls down 20px from the top of the document, show the button
    window.addEventListener("scroll", function(){
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            scrollToTopBtn.style.display = "block";
        } else {
            scrollToTopBtn.style.display = "none";
        }
    });

    // When the user clicks on the button, scroll to the top of the document
    scrollToTopBtn.addEventListener("click", function(){
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    });
});