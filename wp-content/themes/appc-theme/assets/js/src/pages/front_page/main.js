// on document ready here
document.addEventListener("DOMContentLoaded", function() {

    // section elements
    const heroEl = $(".hero");
    const aboutEl = $(".pg-home__about");
    const worksEl = $(".pg-home__works");
    const blogEL = $(".pg-home__blog");
    const contactEL = $(".pg-home__contact");
    const searchEL = $(".header-menu__search-area");

    // hero image elements
    const defaultHeroEL = $(".hero__image--default");
    const blogHeroEL = $(".hero__image--blog");
    const aboutHeroEL = $(".hero__image--about");
    const worksHeroEL = $(".hero__image--works");
    const contactHeroEL = $(".hero__image--contact");

    // button elements
    const aboutBTN = $(".js-ShowAbout");
    const worksBTN = $(".js-ShowWorks");
    const blogBTN = $(".js-ShowBlog");
    const contactBTN = $(".js-ShowContact");
    const searchBTN = $(".js-ShowSearch");

    // body events
    $("body").on("click", ".js-ShowAbout", function() {
        // toggle the is-active class for the elements
        worksEl.removeClass("is-active");
        blogEL.removeClass("is-active");
        contactEL.removeClass("is-active");
        worksBTN.removeClass("is-active");
        blogBTN.removeClass("is-active");
        contactBTN.removeClass("is-active");
        if(aboutEl.hasClass("is-active")) {
            // hide the aboutEl
            heroEl.addClass("is-active");
            aboutEl.removeClass("is-active");
            aboutBTN.removeClass("is-active");
        } else {
            // show the aboutEl
            heroEl.removeClass("is-active");
            aboutEl.addClass("is-active");
            aboutBTN.addClass("is-active");
        }
    }).on("click", ".js-ShowWorks", function() {
        // toggle the is-active class for the elements
        aboutEl.removeClass("is-active");
        contactEL.removeClass("is-active");
        blogEL.removeClass("is-active");
        aboutBTN.removeClass("is-active");
        blogBTN.removeClass("is-active");
        contactBTN.removeClass("is-active");
        if(worksEl.hasClass("is-active")) {
            // hide the worksEl
            heroEl.addClass("is-active");
            worksEl.removeClass("is-active");
            worksBTN.removeClass("is-active");
        } else {
            // show the worksEl
            heroEl.removeClass("is-active");
            worksEl.addClass("is-active");
            worksBTN.addClass("is-active");
        }
    }).on("click", ".js-ShowBlog", function() {
        // toggle the is-active class for the elements
        aboutEl.removeClass("is-active");
        contactEL.removeClass("is-active");
        worksEl.removeClass("is-active");
        worksBTN.removeClass("is-active");
        aboutBTN.removeClass("is-active");
        contactBTN.removeClass("is-active");
        if(blogEL.hasClass("is-active")) {
            // hide the blogEL
            heroEl.addClass("is-active");
            blogEL.removeClass("is-active");
            blogBTN.removeClass("is-active");
        } else {
            // show the blogEL
            heroEl.removeClass("is-active");
            blogEL.addClass("is-active");
            blogBTN.addClass("is-active");
        }
    }).on("click", ".js-ShowContact", function() {
        // toggle the is-active class for the elements
        aboutEl.removeClass("is-active");
        worksEl.removeClass("is-active");
        blogEL.removeClass("is-active");
        worksBTN.removeClass("is-active");
        blogBTN.removeClass("is-active");
        aboutBTN.removeClass("is-active");
        if(contactEL.hasClass("is-active")) {
            // hide the contactEL
            heroEl.addClass("is-active");
            contactEL.removeClass("is-active");
            contactBTN.removeClass("is-active");
        } else {
            // show the contactEL
            heroEl.removeClass("is-active");
            contactEL.addClass("is-active");
            contactBTN.addClass("is-active");
        }
    }).on("click", ".js-ShowSearch", function() {
        // toggle the is-active class for the search field
        searchEL.toggleClass("is-active");
        searchBTN.toggleClass("is-active");
    }).on("submit", ".js-SearchForm", function(evt) {
        evt.preventDefault();
        alert("Search, coming soon!")
    }).on("mouseenter", ".js-ShowAbout", function() {
        if(aboutHeroEL.length > 0) {
            // toggle the is-active class for the elements
            defaultHeroEL.removeClass("is-active");
            aboutHeroEL.addClass("is-active");
        }
    }).on("mouseenter", ".js-ShowWorks", function() {
        if(worksHeroEL.length > 0) {
            // toggle the is-active class for the elements
            defaultHeroEL.removeClass("is-active");
            worksHeroEL.addClass("is-active");
        }
    }).on("mouseenter", ".js-ShowBlog", function() {
        if(blogHeroEL.length > 0) {
            // toggle the is-active class for the elements
            defaultHeroEL.removeClass("is-active");
            blogHeroEL.addClass("is-active");
        }
    }).on("mouseenter", ".js-ShowContact", function() {
        if(contactHeroEL.length > 0) {
            // toggle the is-active class for the elements
            defaultHeroEL.removeClass("is-active");
            contactHeroEL.addClass("is-active");
        }
    }).on("mouseleave", ".js-ShowAbout, .js-ShowWorks, .js-ShowBlog, .js-ShowContact", function() {
        // toggle the is-active class for the elements
        aboutHeroEL.removeClass("is-active");
        worksHeroEL.removeClass("is-active");
        blogHeroEL.removeClass("is-active");
        contactHeroEL.removeClass("is-active");
        defaultHeroEL.addClass("is-active");
    })

});