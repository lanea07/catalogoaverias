import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// Theme Switcher
( () => {
    'use strict'

    const getStoredTheme = () => localStorage.getItem( 'theme' )
    const setStoredTheme = theme => localStorage.setItem( 'theme', theme )

    const getPreferredTheme = () => {
        const storedTheme = getStoredTheme()
        if ( storedTheme ) {
            return storedTheme
        }

        return window.matchMedia( '(prefers-color-scheme: dark)' ).matches ? 'dark' : 'light'
    }

    const setTheme = theme => {
        if ( theme === 'auto' && window.matchMedia( '(prefers-color-scheme: dark)' ).matches ) {
            document.documentElement.setAttribute( 'data-bs-theme', 'dark' )
        } else {
            document.documentElement.setAttribute( 'data-bs-theme', theme )
        }
    }

    setTheme( getPreferredTheme() )

    const showActiveTheme = ( theme, focus = false ) => {
        const themeSwitcher = document.querySelector( '#bd-theme' )

        if ( !themeSwitcher ) {
            return
        }

        const themeSwitcherText = document.querySelector( '#bd-theme-text' )
        const activeThemeIcon = document.querySelector( '.theme-icon-active use' )
        const btnToActive = document.querySelector( `[data-bs-theme-value="${theme}"]` )
        const svgOfActiveBtn = btnToActive.querySelector( 'svg use' ).getAttribute( 'href' )

        document.querySelectorAll( '[data-bs-theme-value]' ).forEach( element => {
            element.classList.remove( 'active' )
            element.setAttribute( 'aria-pressed', 'false' )
        } )

        btnToActive.classList.add( 'active' )
        btnToActive.setAttribute( 'aria-pressed', 'true' )
        activeThemeIcon.setAttribute( 'href', svgOfActiveBtn )
        const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`
        themeSwitcher.setAttribute( 'aria-label', themeSwitcherLabel )

        if ( focus ) {
            themeSwitcher.focus()
        }
    }

    window.matchMedia( '(prefers-color-scheme: dark)' ).addEventListener( 'change', () => {
        const storedTheme = getStoredTheme()
        if ( storedTheme !== 'light' && storedTheme !== 'dark' ) {
            setTheme( getPreferredTheme() )
        }
    } )

    window.addEventListener( 'DOMContentLoaded', () => {
        showActiveTheme( getPreferredTheme() )

        document.querySelectorAll( '[data-bs-theme-value]' )
            .forEach( toggle => {
                toggle.addEventListener( 'click', () => {
                    const theme = toggle.getAttribute( 'data-bs-theme-value' )
                    setStoredTheme( theme )
                    setTheme( theme )
                    showActiveTheme( theme, true )
                } )
            } )
    } )
} )()

// Product Show View Image Modal
const exampleModal = document.getElementById( 'image-viewer' )
if ( exampleModal ) {
    exampleModal.addEventListener( 'show.bs.modal', event => {
        const button = event.relatedTarget
        const recipient = button.getAttribute( 'data-bs-path' )
        const modalBodyInput = exampleModal.querySelector( '.modal-body img' )
        modalBodyInput.src = recipient
    } )
}

// Lang Switcher
( () => {
    'use strict'

    const getStoredLang = () => localStorage.getItem( 'lang' )
    const setStoredLang = lang => localStorage.setItem( 'lang', lang )

    const getPreferredLang = () => {
        const storedLang = getStoredLang()
        if ( storedLang ) {
            return storedLang
        }

        return navigator.language === 'es' ? 'es' : 'en'
    }

    const setLang = lang => {
        if ( navigator.language === 'es' ) {
            document.documentElement.setAttribute( 'data-bs-lang', 'es' )
        } else {
            document.documentElement.setAttribute( 'data-bs-lang', lang )
        }
    }

    setLang( getPreferredLang() )

    const showActiveLang = ( lang, focus = false ) => {
        const langSwitcher = document.querySelector( '#bd-lang' )

        if ( !langSwitcher ) {
            return
        }

        const langSwitcherText = document.querySelector( '#bd-lang-text' )
        const activeLangIcon = document.querySelector( '.lang-icon-active use' )
        const btnToActive = document.querySelector( `[data-bs-lang-value="${lang}"]` )
        const svgOfActiveBtn = btnToActive.querySelector( 'svg use' ).getAttribute( 'href' )

        document.querySelectorAll( '[data-bs-lang-value]' ).forEach( element => {
            element.classList.remove( 'active' )
            element.setAttribute( 'aria-pressed', 'false' )
        } )

        btnToActive.classList.add( 'active' )
        btnToActive.setAttribute( 'aria-pressed', 'true' )
        activeLangIcon.setAttribute( 'href', svgOfActiveBtn )
        const langSwitcherLabel = `${langSwitcherText.textContent} (${btnToActive.dataset.bsLangValue})`
        langSwitcher.setAttribute( 'aria-label', langSwitcherLabel )

        if ( focus ) {
            langSwitcher.focus()
        }
    }

    window.addEventListener( 'DOMContentLoaded', () => {
        showActiveLang( getPreferredLang() )

        document.querySelectorAll( '[data-bs-lang-value]' )
            .forEach( toggle => {
                toggle.addEventListener( 'click', () => {
                    const lang = toggle.getAttribute( 'data-bs-lang-value' )
                    setStoredLang( lang )
                    setLang( lang )
                    showActiveLang( lang, true )
                } )
            } )
    } )
} )()

setTimeout( () => {
    var grid = document.querySelector( '#masonry-container' );
    if ( grid ) {
        var msnry = new Masonry( grid );
        msnry.reloadItems();
    }
}, 2000 );