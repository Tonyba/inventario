(function () {
    let siteUrl = getBaseURL();
    window.addEventListener('load', () => {
        let categoria = document.querySelector('.categoria');
        let search = document.querySelector('.search');
        let submitSearch = document.querySelector('.submitSearch');

        categoria.addEventListener('change', (e) => {
           let categoriaUrl = siteUrl + e.target.value;
            location.href = categoriaUrl;
        });

        submitSearch.addEventListener('click', () => {
            location.href = siteUrl + '0/' + search.value;
        });
    });

    function getBaseURL() {
        var url = location.href;  // entire url including querystring - also: window.location.href;
        var baseURL = url.substring(0, url.indexOf('/', 14));
    
    
        if (baseURL.indexOf('http://localhost') != -1) {
            // Base Url for localhost
            var url = location.href;  // window.location.href;
            var pathname = location.pathname;  // window.location.pathname;
            var index1 = url.indexOf(pathname);
            var index2 = url.indexOf("/", index1 + 1);
            var baseLocalUrl = url.substr(0, index2);
    
            return baseLocalUrl + "/inventario/public/";
        }
        else {
            // Root Url for domain name
            return baseURL;
        }
    }
    
}());