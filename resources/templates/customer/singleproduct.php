<?php
    require_once(dirname(__FILE__)."/../../backend/controllers/productController.php"); 
    /**
    *  Information regarding a specific product is retreived from productController class in json encoded format.
    *  It is decoded and a heredoc containing the product information is created.
    *  Then it is displayed to the user. 
    */
    $product=(new productController())->getProduct($_GET["prod_id"]); 
    $product=json_decode($product);
   
    $HTMLforProduct=<<<"PRODUCT"
<div class="row">
        <div class="col-md-7">
            <img class="img-responsive" src="{$product->prod_image}" alt="" width="700" height="600">
        </div>
        <div class="col-md-5">
            <div class="thumbnail">
                <div class="caption-full">
                    <h4><a href="#">{$product->title}</a> </h4>
                    <hr>
                    <h4 class="">&#163; {$product->price}</h4>
                        <div class="ratings">
                            <p>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star-empty"></span>
                                4.0 stars
                            </p>
                        </div>
                        <p>{$product->short_description}</p>
                        <form action="">
                            <div class="form-group">
                                <a href="/resources/backend/controllers/proxyCartController.php?add={$product->prod_id}" class="btn btn-primary">Add to Cart</a>
                            </div>
                        </form>

                </div>
 
            </div>

        </div>

</div><!--Row For Image and Short Description-->

<!--Row for Tab Panel-->

<div class="row">

    <div role="tabpanel">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
        </ul>

        <!-- Tab panes -->
         <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
            <p></p>
            <p>{$product->long_description}</p>
        </div>
        
        <div role="tabpanel" class="tab-pane" id="profile">

    <div class="col-md-12">

       <h3>Reviews</h3>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
                Anonymous
                <span class="pull-right">10 days ago</span>
                <p>This product was great in terms of quality. I would definitely buy another!</p>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
                Anonymous
                <span class="pull-right">12 days ago</span>
                <p>I've alredy ordered another one!</p>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
                Anonymous
                <span class="pull-right">15 days ago</span>
                <p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
            </div>
        </div>

    </div>
 </div>

 </div>

</div>

</div><!--Row for Tab Panel-->

PRODUCT;
    echo $HTMLforProduct;
?>
