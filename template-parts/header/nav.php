<?php
/**
 * Header Navigation Template
 *
 * @package Blogify
 */

$menu_class = \BLOGIFY_THEME\Inc\Menus::get_instance();
$menu_id = $menu_class->get_menu_id( 'blogify-header-menu' );
$header_menus = wp_get_nav_menu_items( $menu_id );
?>

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php if( !empty( $header_menus ) && is_array( $header_menus ) ) { ?>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         <?php
          foreach ( $header_menus as $menu_item ) {
            if( ! $menu_item->menu_item_parent ) {
              $child_menus = $menu_class->get_child_menu_items( $header_menus, $menu_item->ID );
              if( empty( $child_menus ) ) {
              ?>
              <li id="menu-item-<?php echo esc_attr( $menu_item->ID ); ?>" class="nav-item">
                <a class="nav-link" href="<?php echo esc_url( $menu_item->url ); ?>">
                  <?php echo esc_html( $menu_item->title ); ?>
                </a>
              </li>
                <?php }else{ ?>
              <li id="menu-item-<?php echo esc_attr( $menu_item->ID ); ?>" class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="<?php echo esc_url( $menu_item->url ); ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<?php echo esc_html( $menu_item->title ); ?>
                </a>
                <ul class="dropdown-menu">
                  <?php foreach ( $child_menus as $child_menu_item ){ ?>
                  <li id="menu-item-<?php echo esc_attr( $child_menu_item->ID ); ?>">
                    <a class="dropdown-item" href="<?php echo esc_html( $child_menu_item->url ); ?>">
											<?php echo esc_html( $child_menu_item->title ); ?>
                    </a>
                  </li>
                  <?php } ?>
                </ul>
              </li>
          <?php
							}
						}
					}
         ?>
        </ul>
      <?php } ?>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>