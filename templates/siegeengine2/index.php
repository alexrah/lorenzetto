<?php defined('_JEXEC') or die;
// Load template framework 
include_once JPATH_THEMES . '/' . $this->template . '/framework.php'; 
?>
<!DOCTYPE html>
<!--[if IE 8]>
	<html class="no-js lt-ie9" lang="en" > 
<![endif]-->
<!--[if gt IE 8]>
<!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
	<jdoc:include type="head" />
    <!-- <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/normalize.css" />\
 -->
    <!-- <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/foundation.css" />\
 -->

    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/app.css" />
    <!-- <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/siegeengine.css" /> -->
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/custom.modernizr.js"></script>
      <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
      	<?php if ($setWidth != $defaultWidth) : ?>
        <style>
            .row {
                max-width: <?php echo $setWidth ?>px;
            }
        </style>
    <?php endif; ?>
</head>
<body>

	<?php if ($this->countModules( 'top' )) : ?>
        <section class="row">
			<!--toprow-->
                <jdoc:include type="modules" name="top" style="siegeEngine" />
        </section>
	<?php endif; ?>
	
	<?php if ($this->countModules( 'above' )) : ?>
        <section class="row">
            <!--aboverow-->
            <jdoc:include type="modules" name="above" style="siegeEngine" />
        </section>
    <?php endif; ?>
	
    <div class="row">
    	<!--mainrow-->
        <?php if ($this->countModules( 'left' )) : ?>
            <section class="<?php echo $leftWidth ?> columns sidebar">
                <!--left-row-->
                <jdoc:include type="modules" name="left" style="siegeEngine" />
            </section>
        <?php endif; ?>
        <div class="<?php echo $mainwidth ?> columns">
        	<!--mainrow-->
             <?php if ($this->countModules( 'above-content' )) : ?>
                <div class="above-content">
                    <!--above-content-->
                    <jdoc:include type="modules" name="above-content" style="siegeEngine" />
                </div>
            <?php endif; ?>            
			<?php if ($this->countModules( 'breadcrumbs' )) : ?>
				<div class="large-12">
					<jdoc:include type="modules" name="breadcrumbs" style="none" />
				</div>
			<?php endif; ?>   
    			<jdoc:include type="component" />
            <?php if ($this->countModules( 'below-content' )) : ?>
                <section class="below-content">
                    <!--below-content-->
                    <jdoc:include type="modules" name="below-content" style="siegeEngine" />
                </section>
            <?php endif; ?>
   		</div>
		<?php if ($this->countModules( 'right' )) : ?>
            <section class="<?php echo $rightWidth ?> columns sidebar">
                <!--right-row-->
                <jdoc:include type="modules" name="right" style="siegeEngine" />
            </section>
        <?php endif; ?>
    </div>
	
    <?php if ($this->countModules( 'below' )) : ?>
        <section class="row">
            <!--belowrow-->
                <jdoc:include type="modules" name="below" style="siegeEngine" />
        </section>
    <?php endif; ?>

    <?php if ($this->countModules( 'bottom' )) : ?>
        <section class="row">
            <!--bottomrow-->
            <jdoc:include type="modules" name="bottom" style="siegeEngine" />
        </section>
    <?php endif; ?>
	
    <?php if ($this->countModules( 'footer' )) : ?>
        <footer class="row">
            <!--footerrow-->
            <jdoc:include type="modules" name="footer" style="siegeEngine" />
        </footer>
    <?php endif; ?>
    <?php if ($jQueryOff == 0) : ?>
		<?php if ($jQuery == 1) : ?>
            <script>
              document.write('<script src=<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/' +
              ('__proto__' in {} ? 'zepto' : 'jquery') +
              '.js><\/script>')
              </script>
          <?php else : ?>
          <script src=<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery.js></script>
          <?php endif; ?>
  <?php endif; ?>
  
          <script src=<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery.isotope.min.js></script>


<script type="text/javascript">

// var $container = $('.menu');
// 
// $container.isotope({
//       itemSelector : '.elemento',
//       animationEngine : 'jquery',
//       masonry : {
//         columnWidth : 120
//       },
// });
// 

 $.Isotope.prototype._getCenteredMasonryColumns = function() {
    this.width = this.element.width();
    
    var parentWidth = this.element.parent().width();
    
                  // i.e. options.masonry && options.masonry.columnWidth
    var colW = this.options.masonry && this.options.masonry.columnWidth ||
                  // or use the size of the first item
                  this.$filteredAtoms.outerWidth(true) ||
                  // if there's no items, use size of container
                  parentWidth;
    
    var cols = Math.floor( parentWidth / colW );
    cols = Math.max( cols, 1 );

    // i.e. this.masonry.cols = ....
    this.masonry.cols = cols;
    // i.e. this.masonry.columnWidth = ...
    this.masonry.columnWidth = colW;
  };
  
  $.Isotope.prototype._masonryReset = function() {
    // layout-specific props
    this.masonry = {};
    // FIXME shouldn't have to call this again
    this._getCenteredMasonryColumns();
    var i = this.masonry.cols;
    this.masonry.colYs = [];
    while (i--) {
      this.masonry.colYs.push( 0 );
    }
  };

  $.Isotope.prototype._masonryResizeChanged = function() {
    var prevColCount = this.masonry.cols;
    // get updated colCount
    this._getCenteredMasonryColumns();
    return ( this.masonry.cols !== prevColCount );
  };
  
  $.Isotope.prototype._masonryGetContainerSize = function() {
    var unusedCols = 0,
        i = this.masonry.cols;
    // count unused columns
    while ( --i ) {
      if ( this.masonry.colYs[i] !== 0 ) {
        break;
      }
      unusedCols++;
    }
    
    return {
          height : Math.max.apply( Math, this.masonry.colYs ),
          // fit container to columns that have been used;
          width : (this.masonry.cols - unusedCols) * this.masonry.columnWidth
        };
  };


  $(function(){
    
    var $container = $('#container');
    
    
      // add randomish size classes
      $container.find('.element').each(function(){
        var $this = $(this),
            number = parseInt( $this.find('.number').text(), 10 );
        if ( number % 7 % 2 === 1 ) {
          $this.addClass('width2');
        }
        if ( number % 3 === 0 ) {
          $this.addClass('height2');
        }
      });
    
    $container.isotope({
      itemSelector : '.element',
      animationEngine : 'jquery',
      masonry : {
        columnWidth : 100
      },
      getSortData : {
        symbol : function( $elem ) {
          return $elem.attr('data-symbol');
        },
        category : function( $elem ) {
          return $elem.attr('data-category');
        },
        number : function( $elem ) {
          return parseInt( $elem.find('.number').text(), 10 );
        },
        weight : function( $elem ) {
          return parseFloat( $elem.find('.weight').text().replace( /[\(\)]/g, '') );
        },
        name : function ( $elem ) {
          return $elem.find('.name').text();
        }
      }
    });
      
    
      var $optionSets = $('#options .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options )
        } else {
          // otherwise, apply new options
          $container.isotope( options );
        }
        
        return false;
      });


    
      $('#insert a').click(function(){
        var $newEls = $( fakeElement.getGroup() );
        $container.isotope( 'insert', $newEls );

        return false;
      });

      $('#append a').click(function(){
        var $newEls = $( fakeElement.getGroup() );
        $container.append( $newEls ).isotope( 'appended', $newEls );

        return false;
      });


    var $sortBy = $('#sort-by');
    $('#shuffle a').click(function(){
      $container.isotope('shuffle');
      $sortBy.find('.selected').removeClass('selected');
      $sortBy.find('[data-option-value="random"]').addClass('selected');
      return false;
    });
    
  });

</script>


  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/foundation.min.js"></script>
  <!--
  
  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/foundation.js"></script>
  
  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/foundation.dropdown.js"></script>
  
  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/foundation.placeholder.js"></script>
  
  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/foundation.forms.js"></script>
  
  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/foundation.alerts.js"></script>
  
  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/foundation.magellan.js"></script>
  
  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/foundation.reveal.js"></script>
  
  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/foundation.tooltips.js"></script>
  
  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/foundation.clearing.js"></script>
  
  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/foundation.cookie.js"></script>
  
  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/foundation.joyride.js"></script>
  
  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/foundation.orbit.js"></script>
  
  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/foundation.section.js"></script>
  
  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js//foundation.topbar.js"></script>
  
  -->
  <!-- Load respond.js for shit browsers -->
  
  <!--[if lte IE 8]>  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/respond.js"></script> <![endif]-->
  
  <script>
    $(document).foundation();
  </script>
  <?php if ($analytics != "UA-XXXXX-X") : ?>
<!-- http://mths.be/aab -->
<script>
var _gaq=[['_setAccount','<?php echo htmlspecialchars($analytics); ?>'],["_trackPageview"]];
(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
s.parentNode.insertBefore(g,s)}(document,"script"));
</script>
<?php endif; ?>
<noscript>JavaScript is unavailable or disabled; so you are probably going to miss out on a few things. Everything should still work, but with a little less pzazz!</noscript>

</body>
</html>
