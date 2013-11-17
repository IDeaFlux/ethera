<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Home'); ?>

<div class="container">
    <div class="span12">
        <ul class="thumbnails">
            <div class="thumbnail">
                <div class="hero-unit">
                    <div style="text-align: center"><?php echo $this->Html->image('logo_large.png'); ?></div>
                    <h1 style="text-align: center">Welcome to ETHERA
                    </h1>
                    <p style="text-align: center">ETHERA is a portal that facilitates the students’ industrial placement process of the faculty of Applied Sciences, Rajarata University of Sri Lanka,
                        by providing a better student assessing, selection and communication process in between University, industry
                        and students.
                    </p>
                </div>
                <ul class="thumbnails">
                    <div class="span4" style="padding-left: 10px">
                        <div class="thumbnail">
                            <h3>Events Calender</h3>
                            <!--First Calender inserted  -->
<!--
                                <iframe src="https://www.google.com/calendar/embed?src=lg7d51der6evp1bvdfhvfu094g%40group.calendar.google.com&ctz=Asia/Colombo"-->
<!--                                 style="border: 0; max-width: 100%" width="360" height="240" frameborder="0" scrolling="yes">-->
<!--                           </iframe> -->

                            <!--First Calender inserted  -->
<!--                          <iframe src="https://www.google.com/calendar/embed?showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;height=360&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=8hnnp6ndfkvh6q6mprsslh8uds%40group.calendar.google.com&amp;color=%232F6309&amp;ctz=Asia%2FColombo" style=" border-width:0 " width="360" height="360" frameborder="0" scrolling="no">
                            </iframe>  -->

                            <!-- yohani.ysr calendar for ETHERA events -->
<!--                            <iframe src="https://www.google.com/calendar/embed?src=84175rm5je1sfg2oafoufvhsjs%40group.calendar.google.com&ctz=Asia/Colombo" style="border: 0" width="360" height="360" frameborder="0" scrolling="no">  --> <!-- </iframe> -->

                            <!-- Final calendar for ETHERA events -->
                            <iframe src="https://www.google.com/calendar/embed?src=15642bevcork1use0l1qokb0vs%40group.calendar.google.com&ctz=Asia/Colombo" style="border: 0; max-width: 100%" width="360" height="240" frameborder="0" scrolling="yes"></iframe>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="thumbnail">
                            <h3>Notice Board</h3>

                        </div>
                    </div>
                    <div class="span4">
                        <div class="thumbnail">
                            <h3>From Blog</h3>

                        </div>
                    </div>
                </ul>
            </div>
        </ul>
    </div>
</div>

<script>
    function adjustIframes()
    {
        $('iframe').each(function(){
            var
                $this       = $(this),
                proportion  = $this.data( 'proportion' ),
                w           = $this.attr('width'),
                actual_w    = $this.width();

            if ( ! proportion )
            {
                proportion = $this.attr('height') / w;
                $this.data( 'proportion', proportion );
            }

            if ( actual_w != w )
            {
                $this.css( 'height', Math.round( actual_w * proportion ) + 'px' );
            }
        });
    }
    $(window).on('resize load',adjustIframes);
</script>