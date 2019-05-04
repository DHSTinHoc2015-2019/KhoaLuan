<template>
    <section id="hero-area" >
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="block fadeInUp">
                        <!-- Slider -->
                        <section class="cd-intro">
                            <h1 class="fadeInUp animated cd-headline slide">
                            <!-- <span>TPACK (Technological Pedagogical Content Knowledge) </span><br> -->
                            <span>Mô hình TPACK </span><br>
                            <span class="cd-words-wrapper pt-2">
                                <b class="is-visible">Kiến thức về nội dung giảng dạy</b>
                                <b>Kiến thức phương pháp</b>
                                <b>Kiến thức công nghệ </b>
                            </span>
                            </h1>
                        </section> <!-- cd-intro -->
                        <!-- /.slider -->
                        <h2 class="fadeInUp animated">
                            Lý thuyết TPACK được sử dụng để đo những chuyển biến trong tư duy của giáo viên / giảng viên về ICT trong giáo dục.<br> Ba mảng kiến thức khi kết hợp lại với nhau sẽ tạo một mô hình tổng hợp <br>về năng lực cần có của giáo viên
                        </h2>
                        <router-link class="btn-lines dark light fadeInUp animated smooth-scroll btn btn-default btn-green" to="/gioithieu" data-section="#works">Xem thêm</router-link>
                    </div>
                </div>
            </div>
        </div>
        <!-- <img src="images/tpack.jpg" alt=""> -->
    </section>	
</template>

<style>
    /*@import url(http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700);*/
    /*@import url(http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700);*/
        #hero-area {
            background: url("../../../../assets/images/tpack.jpg") no-repeat 50%;
            background-size: cover;
            background-attachment: fixed;
            padding: 190px 0;
            color: #fff;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        #hero-area:before {
        content: '';
        z-index: 9;
        background: rgba(2, 2, 2, 0.66);
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        }

        #hero-area .block {
        position: relative;
        z-index: 999;
        }

        #hero-area h1 {
        font-size: 40px;
        line-height: 50px;
        color: white;
        font-weight: 700;
        margin-bottom: 15px;
        text-transform: uppercase;
        font-family: "Roboto Condensed", sans-serif;
        }

        #hero-area h2 {
        font-size: 18px;
        font-weight: 300;
        margin-bottom: 38px;
        line-height: 27px;
        text-transform: uppercase;
        color: white;
        font-family: 'Roboto', sans-serif;
        margin-top: 25px;
        }

        #hero-area .btn {
        background: #00cefb66;
        border: none;
        color: #fff;
        padding: 20px 35px;
        margin-top: 30px;
        font-size: 16px;
        font-size: 13px;
        line-height: 1em;
        text-transform: uppercase;
        letter-spacing: normal;
        border-radius: 10px;
        }

        #hero-area .btn:hover {
        background: #00cefbb3;
        }
    .cd-headline.slide .cd-words-wrapper {
        color: #02bdd5;
    }
    /* -------------------------------- 

Primary style

-------------------------------- */


.cd-words-wrapper {
  display: inline-block;
  position: relative;
  text-align: left;
}
.cd-words-wrapper b {
  display: inline-block;
  position: absolute;
  white-space: nowrap;
  left: 0;
  top: 0;
}
.cd-words-wrapper b.is-visible {
  position: relative;
}
.no-js .cd-words-wrapper b {
  opacity: 0;
}
.no-js .cd-words-wrapper b.is-visible {
  opacity: 1;
}

/*
xslide 

-------------------------------- */
.cd-headline.slide span {
  display: inline-block;
  padding: .2em 0;
}
.cd-headline.slide .cd-words-wrapper {
  overflow: hidden;
  vertical-align: top;
  width: auto!important;
}
.cd-headline.slide b {
  opacity: 0;
  top: .2em;
}
.cd-headline.slide b.is-visible {
  top: 0;
  opacity: 1;
  -webkit-animation: slide-in 0.6s;
  -moz-animation: slide-in 0.6s;
  animation: slide-in 0.6s;
}
.cd-headline.slide b.is-hidden {
  -webkit-animation: slide-out 0.6s;
  -moz-animation: slide-out 0.6s;
  animation: slide-out 0.6s;
}

@-webkit-keyframes slide-in {
  0% {
    opacity: 0;
    -webkit-transform: translateY(-100%);
  }
  60% {
    opacity: 1;
    -webkit-transform: translateY(20%);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
  }
}
@-moz-keyframes slide-in {
  0% {
    opacity: 0;
    -moz-transform: translateY(-100%);
  }
  60% {
    opacity: 1;
    -moz-transform: translateY(20%);
  }
  100% {
    opacity: 1;
    -moz-transform: translateY(0);
  }
}
@keyframes slide-in {
  0% {
    opacity: 0;
    -webkit-transform: translateY(-100%);
    -moz-transform: translateY(-100%);
    -ms-transform: translateY(-100%);
    -o-transform: translateY(-100%);
    transform: translateY(-100%);
  }
  60% {
    opacity: 1;
    -webkit-transform: translateY(20%);
    -moz-transform: translateY(20%);
    -ms-transform: translateY(20%);
    -o-transform: translateY(20%);
    transform: translateY(20%);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    -moz-transform: translateY(0);
    -ms-transform: translateY(0);
    -o-transform: translateY(0);
    transform: translateY(0);
  }
}
@-webkit-keyframes slide-out {
  0% {
    opacity: 1;
    -webkit-transform: translateY(0);
  }
  60% {
    opacity: 0;
    -webkit-transform: translateY(120%);
  }
  100% {
    opacity: 0;
    -webkit-transform: translateY(100%);
  }
}
@-moz-keyframes slide-out {
  0% {
    opacity: 1;
    -moz-transform: translateY(0);
  }
  60% {
    opacity: 0;
    -moz-transform: translateY(120%);
  }
  100% {
    opacity: 0;
    -moz-transform: translateY(100%);
  }
}
@keyframes slide-out {
  0% {
    opacity: 1;
    -webkit-transform: translateY(0);
    -moz-transform: translateY(0);
    -ms-transform: translateY(0);
    -o-transform: translateY(0);
    transform: translateY(0);
  }
  60% {
    opacity: 0;
    -webkit-transform: translateY(120%);
    -moz-transform: translateY(120%);
    -ms-transform: translateY(120%);
    -o-transform: translateY(120%);
    transform: translateY(120%);
  }
  100% {
    opacity: 0;
    -webkit-transform: translateY(100%);
    -moz-transform: translateY(100%);
    -ms-transform: translateY(100%);
    -o-transform: translateY(100%);
    transform: translateY(100%);
  }
}
/* -------------------------------- */
</style>

<script>
    export default {
        mounted() {
            jQuery(document).ready(function($){
    //set animation timing
    var animationDelay = 2500,
        //loading bar effect
        barAnimationDelay = 3800,
        barWaiting = barAnimationDelay - 3000, //3000 is the duration of the transition on the loading bar - set in the scss/css file
        //letters effect
        lettersDelay = 50,
        //type effect
        typeLettersDelay = 150,
        selectionDuration = 500,
        typeAnimationDelay = selectionDuration + 800,
        //clip effect 
        revealDuration = 600,
        revealAnimationDelay = 1500;
    
    initHeadline();
    

    function initHeadline() {
        //insert <i> element for each letter of a changing word
        singleLetters($('.cd-headline.letters').find('b'));
        //initialise headline animation
        animateHeadline($('.cd-headline'));
    }

    function singleLetters($words) {
        $words.each(function(){
            var word = $(this),
                letters = word.text().split(''),
                selected = word.hasClass('is-visible');
            for (i in letters) {
                if(word.parents('.rotate-2').length > 0) letters[i] = '<em>' + letters[i] + '</em>';
                letters[i] = (selected) ? '<i class="in">' + letters[i] + '</i>': '<i>' + letters[i] + '</i>';
            }
            var newLetters = letters.join('');
            word.html(newLetters).css('opacity', 1);
        });
    }

    function animateHeadline($headlines) {
        var duration = animationDelay;
        $headlines.each(function(){
            var headline = $(this);
            
            if(headline.hasClass('loading-bar')) {
                duration = barAnimationDelay;
                setTimeout(function(){ headline.find('.cd-words-wrapper').addClass('is-loading') }, barWaiting);
            } else if (headline.hasClass('clip')){
                var spanWrapper = headline.find('.cd-words-wrapper'),
                    newWidth = spanWrapper.width() + 10
                spanWrapper.css('width', newWidth);
            } else if (!headline.hasClass('type') ) {
                //assign to .cd-words-wrapper the width of its longest word
                var words = headline.find('.cd-words-wrapper b'),
                    width = 0;
                words.each(function(){
                    var wordWidth = $(this).width();
                    if (wordWidth > width) width = wordWidth;
                });
                headline.find('.cd-words-wrapper').css('width', width);
            };

            //trigger animation
            setTimeout(function(){ hideWord( headline.find('.is-visible').eq(0) ) }, duration);
        });
    }

    function hideWord($word) {
        var nextWord = takeNext($word);
        
        if($word.parents('.cd-headline').hasClass('type')) {
            var parentSpan = $word.parent('.cd-words-wrapper');
            parentSpan.addClass('selected').removeClass('waiting'); 
            setTimeout(function(){ 
                parentSpan.removeClass('selected'); 
                $word.removeClass('is-visible').addClass('is-hidden').children('i').removeClass('in').addClass('out');
            }, selectionDuration);
            setTimeout(function(){ showWord(nextWord, typeLettersDelay) }, typeAnimationDelay);
        
        } else if($word.parents('.cd-headline').hasClass('letters')) {
            var bool = ($word.children('i').length >= nextWord.children('i').length) ? true : false;
            hideLetter($word.find('i').eq(0), $word, bool, lettersDelay);
            showLetter(nextWord.find('i').eq(0), nextWord, bool, lettersDelay);

        }  else if($word.parents('.cd-headline').hasClass('clip')) {
            $word.parents('.cd-words-wrapper').animate({ width : '2px' }, revealDuration, function(){
                switchWord($word, nextWord);
                showWord(nextWord);
            });

        } else if ($word.parents('.cd-headline').hasClass('loading-bar')){
            $word.parents('.cd-words-wrapper').removeClass('is-loading');
            switchWord($word, nextWord);
            setTimeout(function(){ hideWord(nextWord) }, barAnimationDelay);
            setTimeout(function(){ $word.parents('.cd-words-wrapper').addClass('is-loading') }, barWaiting);

        } else {
            switchWord($word, nextWord);
            setTimeout(function(){ hideWord(nextWord) }, animationDelay);
        }
    }

    function showWord($word, $duration) {
        if($word.parents('.cd-headline').hasClass('type')) {
            showLetter($word.find('i').eq(0), $word, false, $duration);
            $word.addClass('is-visible').removeClass('is-hidden');

        }  else if($word.parents('.cd-headline').hasClass('clip')) {
            $word.parents('.cd-words-wrapper').animate({ 'width' : $word.width() + 10 }, revealDuration, function(){ 
                setTimeout(function(){ hideWord($word) }, revealAnimationDelay); 
            });
        }
    }

    function hideLetter($letter, $word, $bool, $duration) {
        $letter.removeClass('in').addClass('out');
        
        if(!$letter.is(':last-child')) {
            setTimeout(function(){ hideLetter($letter.next(), $word, $bool, $duration); }, $duration);  
        } else if($bool) { 
            setTimeout(function(){ hideWord(takeNext($word)) }, animationDelay);
        }

        if($letter.is(':last-child') && $('html').hasClass('no-csstransitions')) {
            var nextWord = takeNext($word);
            switchWord($word, nextWord);
        } 
    }

    function showLetter($letter, $word, $bool, $duration) {
        $letter.addClass('in').removeClass('out');
        
        if(!$letter.is(':last-child')) { 
            setTimeout(function(){ showLetter($letter.next(), $word, $bool, $duration); }, $duration); 
        } else { 
            if($word.parents('.cd-headline').hasClass('type')) { setTimeout(function(){ $word.parents('.cd-words-wrapper').addClass('waiting'); }, 200);}
            if(!$bool) { setTimeout(function(){ hideWord($word) }, animationDelay) }
        }
    }

    function takeNext($word) {
        return (!$word.is(':last-child')) ? $word.next() : $word.parent().children().eq(0);
    }

    function takePrev($word) {
        return (!$word.is(':first-child')) ? $word.prev() : $word.parent().children().last();
    }

    function switchWord($oldWord, $newWord) {
        $oldWord.removeClass('is-visible').addClass('is-hidden');
        $newWord.removeClass('is-hidden').addClass('is-visible');
    }
});   
        }
    }
</script>