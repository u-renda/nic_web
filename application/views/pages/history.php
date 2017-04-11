<aside class="sidebar">
    <h4 class="heading-primary">History</h4>
    <ul class="nav nav-list mb-xlg">
        <?php foreach ($history as $temp_year => $value)
        {
            echo '<li class="nav-grand-parent"><a class="hand-pointer grand-parent">'.$temp_year.'</a>';
            echo '<ul class="nav nav-grand-children">';
            foreach ($value as $month => $val)
            {
                echo '<li class="nav-parent"><a class="hand-pointer parent">'.$month.'</a>';
                echo '<ul class="nav nav-children">';
                foreach ($val as $slug => $title)
                {
                    echo '<li><a href="'.$link_pages.'/'.$slug.'">'.$title.'</a></li>';
                }
                echo '</ul></li>';
            }
            echo '</ul></li>';
        } ?>
    </ul>
</aside>