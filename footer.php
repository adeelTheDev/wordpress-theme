<?php
/**
 * Footer Template
 *
 * @package Blogify
 */
?>
</div> <!-- div#content -->
<footer class="py-5 mt-5 border-top bg-white">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-3 mb-3">
				<?php dynamic_sidebar( 'footer-1' ) ?>
            </div>

            <div class="col-sm-12 col-lg-3 mb-3">
				<?php dynamic_sidebar( 'footer-2' ) ?>
            </div>

            <div class="col-sm-12 col-lg-3 mb-3">
				<?php dynamic_sidebar( 'footer-3' ) ?>
            </div>

            <div class="col-sm-12 col-lg-3 mb-3">
				<?php dynamic_sidebar( 'footer-4' ) ?>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p>&copy; 2024 Company, Inc. All rights reserved.</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-body-emphasis" href="#">
                        <svg class="bi" width="24" height="24">
                            <use xlink:href="#twitter" />
                        </svg>
                    </a></li>
                <li class="ms-3"><a class="link-body-emphasis" href="#">
                        <svg class="bi" width="24" height="24">
                            <use xlink:href="#instagram" />
                        </svg>
                    </a></li>
                <li class="ms-3"><a class="link-body-emphasis" href="#">
                        <svg class="bi" width="24" height="24">
                            <use xlink:href="#facebook" />
                        </svg>
                    </a></li>
            </ul>
        </div>
    </div>
</footer>
</div> <!-- div#page -->
<?php wp_footer(); ?>

</body>
</html>