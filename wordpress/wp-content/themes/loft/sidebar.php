
<div class="sidebar">
    <div class="sidebar__sidebar-item">
        <div class="sidebar-item__title">Теги</div>
        <div class="sidebar-item__content">
            <?php
                    if ( function_exists('wp_tag_cloud') ){
                        wp_tag_cloud('smallest=8&largest=22');
                    }
                    ?>
        </div>
    </div>
    <div class="sidebar__sidebar-item">
        <div class="sidebar-item__title">Категории</div>
        <div class="sidebar-item__content">
            <ul class="category-list">
                <li class="category-list__item"><a href="#" class="category-list__item__link">
                        Вылеты из
                        столиц</a>
                    <ul class="category-list__inner">
                        <li class="category-list__item"><a href="#" class="category-list__item__link">Москва</a></li>
                        <li class="category-list__item"><a href="#" class="category-list__item__link">Санкт-Петербург</a></li>
                    </ul>
                </li>
                <li class="category-list__item"><a href="#" class="category-list__item__link">
                        Вылеты из
                        регионов</a>
                    <ul class="category-list__inner">
                        <li class="category-list__item"><a href="#" class="category-list__item__link">Москва</a></li>
                        <li class="category-list__item"><a href="#" class="category-list__item__link">Санкт-Петербург</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <?php get_calendar(); ?>
</div>