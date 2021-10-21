
@php
$main_color = Auth::user()->main_color;
$primary_color = Auth::user()->primary_color;
$secondary_color  = Auth::user()->secondary_color;
@endphp

<style>
  
:root {
    --main-color: <?php echo $main_color; ?>;
    --primary-color: <?php echo $primary_color; ?>;
    --secondary-color: <?php echo $secondary_color; ?>;
}

.btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
}

.btn-outline-secondary {
    color: var(--secondary-color);
    border-color: var(--secondary-color);

}

.tab-nav .nav-item .active {
    border-bottom: 2px solid var(--main-color) !important;
}

.btn-info {
    background-color: var(--primary-color);
    border-color: var(--primary-color);

}


.question-left ul .active {
    background: var(--secondary-color);
}


</style>