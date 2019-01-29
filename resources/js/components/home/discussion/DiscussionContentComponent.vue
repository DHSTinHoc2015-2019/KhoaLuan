<template>
	<section id="discussion-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-container" id="main">
            <div class="popular-searches clearfix">
                <ul class="results">
                    <li>
                        <a href="#" target="_blank" class="list clearfix first">
                            <div class="num"><span>1</span></div>
                            <div class="adTextWrap">
                                <p class="title">Innocom Technologies</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank" class="list clearfix">
                            <div class="num"><span>2</span></div>
                            <div class="adTextWrap">
                                <p class="title"><b>Car</b> FlixBus Pas Cher depuis - A&eacute;roport de B&acirc;le</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
                </div>
            </div>
        </div>
	</section>
</template>

<style scoped>
/* *{
    margin:0;
     padding:0;
}*/
 a {
    text-decoration:none;
     outline:none
}
 a img {
    border:none
}
 li {
    list-style:none
}
 .clear {
    clear:both;
     overflow:hidden;
     line-height:0;
     font-size:0;
     height:0
}
 .clearfix:after{
    visibility:hidden;
    display:block;
    font-size:0;
    content:" ";
    clear: both;
    height:0
}

 .main-container{
    /*width: 960px;*/
     margin: 0 auto;
    padding-top: 1px;
    padding-bottom: 1px;
}

 .popular-searches ul{
     list-style: none;
}
 .popular-searches ul.last, .related-searches ul.last{
     border-bottom:0
}

 .popular-searches li{
     -webkit-text-size-adjust: 100%;
    color: #ffffff;
     margin-bottom: 10px;
    background: #344152;
}
 .popular-searches li a{
    font-size: 20px;
     color: #ffffff;
     display:block;
     line-height: 24px;
     -webkit-text-size-adjust: 100%;
    background: url(/images/views/arrow.png) 96% center no-repeat;
     font-weight: 600;
    position: relative;
}
 .popular-searches li a:hover{
    color: #6aae2b
}
 ul{
    list-style: none
}
 .results{
     display: block;
     margin: 0 auto
}
 .results li{
     display: block;
}
 .results li:hover{
    background: #22528a;
}
 .results li:hover .num{
    background: url(/images/views/numbgh.png);
}
 .num{
    font-size: 22px;
     color: #ffffff;
     float: left;
     width: 48px;
     line-height: 50px;
     height: 59px;
     text-align: center;
    margin-top: -25px;
    position:absolute;
     top: 50%;
     font-weight: 400;
    background: url(/images/views/numbg.png);
     margin-left:-10px;
     background-size: 50px 59px;
     font-weight: bold;
}
 .adTextWrap{
    width: 85%;
    line-height: 18px;
     padding-left: 60px;
}
 a.list{
     word-wrap:break-word;
     display: block;
    padding: 20px 70px 20px 0px;
}
 a.list .title{
    font-size: 20px;
    color: #ffffff;
    line-height: 28px;
    margin-bottom: 3px;
    font-weight: 600
}
 a.list .url{
    color: #437fbf;
    display: block;
    font-size: 15px;
    line-height: 19px;
    font-weight: 300
}
 a.list .desc{
    color:#5f7188;
     font-size: 15px;
     line-height: 19px;
    font-weight: 300;
     display: block;
     margin-bottom: 3px;
}
 a.list .sepr{
    color:#919191;
     font-size: 17px;
    display: none;
    font-weight: 300
}
 a.list.first{
    border-top: 0px
}
 .custom-msg {
     text-align: center;
    background-color: #fff;
}
 .results li:hover .title{
    color:#ffffff
}
 .results li:hover .url, .results li:hover .desc, .results li:hover .sepr{
    color: #ffffff
}
 
 @media only screen and (max-width:990px) {
     .popular-searches li a{
        font-size: 16px
    }
     .main-container{
        width: 760px;
    }
     .srchTxt{
        width: 197px;
        font-size: 16px;
        line-height: 20px
    }
}
 @media not all and (min-width: 880px){
     .adTextWrap{
        width: 80%
    }
}
 @media only screen and (max-width:776px) {
     #main{
        width: 90%;
        margin: 0px auto
    }
     .popular-searches li a{
        font-size: 14px;
    }
}
 @media only screen and (max-width:767px) {
     .popular-searches li a, .related-searches li a{
        margin-left: 0
    }
     .popular-searches li a{
        padding-left: 0px
    }
     .popular-searches-wrap{
        margin-bottom: 10px
    }
     .results li{
         display: block;
        padding: 0 5px
    }
    .main-container{
        margin-bottom: 5px!important
    }
     .num{
        margin-left: -15px;
    }
}
 @media not all and (min-width: 736px) {
     .adTextWrap{
        width: 82%
    }
     a.list {
        padding:15px 10px 15px 0;
        padding-right: 40px
    }
     a.list .title{
        font-size: 18px;
        margin-bottom: 5px;
        line-height: 23px
    }
     a.list .desc{
        display: block;
        font-size: 14px
    }
     a.list .url{
        display: block;
        font-size: 14px
    }
     a.list .sepr{
        display: none
    }
}
 @media not all and (min-width: 480px) {
     a.list{
        padding-right: 40px !important
    }
     .adTextWrap{
        width: 78%
    }
     .results .num{
        padding-left: 0
    }
}
 @media only screen and (max-width:450px) {
     .srchTxt{
        width: 186px;
        font-size: 16px;
        line-height: 20px
    }
     .srchBtn{
        width: 59px;
        font-size: 13px
    }
}
 @media not all and (min-width: 400px) {
     .adTextWrap{
        width: 76%
    }
}
 @media not all and (min-width: 320px){
     .results .num{
        display: none
    }
     .results li{
        background-image: none !important
    }
     a.list{
        padding-left: 10px;
        padding-right: 30px !important
    }
     .adTextWrap{
        width: auto;
        padding: 0;
        float: none
    }
}
</style>