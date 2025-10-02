document.addEventListener('DOMContentLoaded', function () {
    var categoryTabs = document.querySelectorAll('.frame-type-category_tab');
    categoryTabs.forEach((categoryTab) => {
        var tabs = categoryTab.querySelectorAll('.nav-link');
        tabs.forEach((tab) => {
            tab.addEventListener('click', function(event) {
                tabs.forEach((siblingTab) => {
                    siblingTab.classList.remove("active");
                });
                tab.classList.add("active");

                var selectedCategory = tab.dataset.category;
                var cards = categoryTab.querySelectorAll('.card-menu-item');

                cards.forEach((card) => {
                    card.style.display = 'block';
                    if (selectedCategory != '') {
                        var cardCategory = JSON.parse(card.dataset.categories);
                        if (!cardCategory.includes(parseInt(selectedCategory))) {
                            card.style.display = 'none';
                        }
                    }
                });
                servicePaginate();
            });
        });
    });

    function servicePaginate() {
        var container = $('.paginated-data');
        container.each(function(){
            var container = $(this);
            var items = container.find('.card-menu-item:visible');
            var numItems = items.length;
            var perPage = 10;
            items.slice(perPage).hide();
            container.find('.pagination-container').pagination({
                items: numItems,
                itemsOnPage: perPage,
                prevText: "<",
                nextText: ">",
                onPageClick: function (pageNumber) {
                    var showFrom = perPage * (pageNumber - 1);
                    var showTo = showFrom + perPage;
                    items.hide().slice(showFrom, showTo).show();
                }
            });
        });
    }
    servicePaginate();
});
