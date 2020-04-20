<style type="text/css">
/******************  News Slider Demo-1 *******************/
.post-slide{overflow:hidden;margin-right:15px;background-color:#fff!important}
.post-slide .post-img{float:left;width:50%;position:relative;margin-right:30px}
.post-slide .post-img img{width:100%;height:auto}
.post-slide .post-date{background:#ec3c6a;color:#fff;position:absolute;top:0;right:0;display:block;padding:2% 3%;width:60px;height:60px;text-align:center;transition:all .5s ease}
.post-slide .date{display:block;font-size:20px;font-weight:700}
.post-slide .month{display:block;font-size:11px;text-transform:uppercase}
.post-slide .post-review{padding:5% 3% 1% 0;border-top:3px solid #38cfd8}
.post-slide:hover .post-review{border-top-color:#ec3c6a}
.post-slide .post-title{margin:0 0 10px 0}
.post-slide .post-title a{font-size:14px;color:#333;text-transform:uppercase}
.post-slide .post-title a:hover{text-decoration:none;font-weight:700}
.post-slide .post-bar{padding:0;list-style:none;text-transform:uppercase;position:relative;margin-bottom:20px}
.post-slide .post-bar:after,.post-slide .post-bar:before{border:1px solid #38cfd8;bottom:-10px;content:"";display:block;position:absolute;right:36%;width:25px}
.post-slide .post-bar:before{border:1px solid #ec3c6a;right:32%}
.post-slide .post-bar li{color:#555;font-size:10px;margin-right:10px;display:inline-block}
.post-slide .post-bar li a{font-size:13px;text-decoration:none;text-transform:uppercase;color:#ec3c6a}
.post-slide .post-bar li a:hover{color:#ec3c6a}
.post-slide .post-bar li i{color:#777;margin-right:5px}
.post-slide .post-description{font-size:12px;line-height:21px;color:#444454}
.owl-theme .owl-controls{margin-top:30px}
.owl-theme .owl-controls .owl-page span{background:#fff;border:2px solid #37a6a4}
.owl-theme .owl-controls .owl-page.active span,.owl-theme .owl-controls.clickable .owl-page:hover span{background:#37a6a4}
@media only screen and (max-width:990px){.post-slide .post-img{width:100%}
.post-slide .post-review{width:100%;border-bottom:4px solid #ec3c6a}
.post-slide .post-bar:before{left:0}
.post-slide .post-bar:after{left:25px}
}

/******************  News Slider Demo-2 *******************/
.demo{background:linear-gradient(to right,#fcc,#d3d3d3)}
.post-slide2{margin:0 15px;box-shadow:0 1px 2px rgba(43,59,93,.3);margin-bottom:2em}
.post-slide2 .post-img{overflow:hidden}
.post-slide2 .post-img img{width:100%;height:auto;transform:scale(1);transition:all 1s ease-in-out 0s}
.post-slide2:hover .post-img img{transform:scale(1.08)}
.post-slide2 .post-content{background:#fff;padding:20px}
.post-slide2 .post-title{font-size:17px;font-weight:600;margin-top:0;text-transform:capitalize}
.post-slide2 .post-title a{display:inline-block;color:grey;transition:all .3s ease 0s}
.post-slide2 .post-title a:hover{color:#3d3030;text-decoration:none}
.post-slide2 .post-description{font-size:15px;color:#676767;line-height:24px;margin-bottom:14px}
.post-slide2 .post-bar{padding:0;margin-bottom:15px;list-style:none}
.post-slide2 .post-bar li{color:#676767;padding:2px 0}
.post-slide2 .post-bar li i{margin-right:5px}
.post-slide2 .post-bar li a{display:inline-block;font-size:12px;color:grey;transition:all .3s ease 0s}
.post-slide2 .post-bar li a:after{content:","}
.post-slide2 .post-bar li a:last-child:after{content:""}
.post-slide2 .post-bar li a:hover{color:#3d3030;text-decoration:none}
.post-slide2 .read-more{display:inline-block;padding:10px 15px;font-size:14px;font-weight:700;color:#fff;background:#e7989a;border-bottom-right-radius:10px;text-transform:capitalize;transition:all .3s linear}
.post-slide2 .read-more:hover{background:#333;text-decoration:none}

/******************  News Slider Demo-3 *******************/
.post-slide3{margin:0 15px;padding:0 25px 20px 25px;background:#fff;box-shadow:0 1px 2px rgba(43,59,93,.3);margin-bottom:2em}
.post-slide3 .post-img{position:relative;margin-bottom:20px}
.post-slide3 .post-img img{width:100%;height:auto}
.post-slide3 .post-icon{width:60px;height:60px;display:block;position:absolute;bottom:25px;left:25px;text-align:center;background:#333;opacity:0;border-radius:3px;transition:all .3s ease-in-out 0s}
.post-slide3:hover .post-icon{opacity:1}
.post-slide3 .post-icon i{font-size:20px;color:#fff;line-height:60px}
.post-slide3 .post-bar{margin:0;padding:0;list-style:none;text-transform:uppercase}
.post-slide3 .post-bar li{display:inline-block;font-size:15px;color:#676767;margin-right:5px}
.post-slide3 .post-bar li:after{content:"/";margin-left:5px}
.post-slide3 .post-bar li:last-child:after{content:""}
.post-slide3 .post-bar li a{color:#8e44ad;transition:all .3s ease 0s}
.post-slide3 .post-bar li a:hover{color:#333;text-decoration:none}
.post-slide3 .post-bar li a:after{content:",";margin:0 5px}
.post-slide3 .post-bar li a:last-child:after{content:""}
.post-slide3 .post-title{margin:15px 0;text-transform:capitalize}
.post-slide3 .post-title a{font-size:22px;font-weight:600;color:#3c3c3c;transition:all .3s linear 0s}
.post-slide3 .post-title a:hover{color:#8e44ad;text-decoration:none}
.post-slide3 .post-description{font-size:16px;color:#676767;line-height:24px;padding-bottom:15px}
.post-slide3 .read-more{display:inline-block}
.post-slide3 .read-more:hover{text-decoration:none}
.post-slide3 .read-more i{font-size:19px;color:#333;margin-right:5px;transition:all .4s linear 0s}
.post-slide3 .read-more span{font-size:16px;color:#333;opacity:0;text-transform:uppercase;transition:all .4s linear 0s}
.post-slide3 .read-more:after{content:"";display:block;width:40%;position:relative;bottom:-20px;border-bottom:3px solid #333;opacity:0;transition:all .4s linear 0s}
.post-slide3:hover .read-more span,.post-slide3:hover .read-more:after{opacity:1}
.post-slide3 .read-more:hover i,.post-slide3 .read-more:hover span,.post-slide3 .read-more:hover:after{color:#8e44ad;border-bottom-color:#8e44ad}

/******************  News Slider Demo-4 *******************/
.post-slide4{margin:0 10px;background:#fff;box-shadow:0 1px 2px rgba(43,59,93,.3);margin-bottom:2em}
.post-slide4 .post-info{padding:5px 10px;margin:0;list-style:none}
.post-slide4 .post-info li{display:inline-block;margin:0 5px}
.post-slide4 .post-info li i{margin-right:8px}
.post-slide4 .post-info li a{font-size:11px;font-weight:700;color:#7e828a;text-transform:uppercase}
.post-slide4 .post-info li a:hover{color:#1dcfd1;text-decoration:none}
.post-slide4 .post-img{position:relative}
.post-slide4 .post-img:before{content:"";width:100%;height:100%;position:absolute;top:0;left:0;opacity:0;background:rgba(0,0,0,.6);transition:opacity .4s linear 0s}
.post-slide4:hover .post-img:before{opacity:1}
.post-slide4 .post-img img{width:100%;height:auto}
.post-slide4 .read{position:absolute;bottom:30px;left:50px;font-size:14px;color:#fff;text-transform:capitalize;opacity:0;transition:all .4s linear 0s}
.post-slide4:hover .read{opacity:1}
.post-slide4 .read:hover{text-decoration:none;color:#1dcfd1}
.post-slide4 .post-content{padding:40px 15px;position:relative}
.post-slide4 .post-author{width:75px;height:75px;border-radius:50%;position:absolute;top:-45px;right:10px;overflow:hidden;border:4px solid #fff}
.post-slide4 .post-author img{width:100%;height:auto}
.post-slide4 .post-title{font-size:14px;font-weight:700;color:#1dcfd1;margin:0 0 10px 0;text-transform:uppercase;transition:all .3s linear 0s}
.post-slide4 .post-title:after{content:"";width:25px;display:block;margin-top:10px;border-bottom:4px solid #333}
.post-slide4 .post-description{font-size:13px;color:#555;margin-bottom:20px}

/******************  News Slider Demo-5 *******************/
.post-slide5{margin:0 15px;transition:all .4s ease-in-out 0s;box-shadow:0 1px 2px rgba(43,59,93,.3);margin-bottom:2em}
.post-slide5 .post-img{position:relative;overflow:hidden}
.post-slide5 .post-img:before{content:"";width:100%;height:100%;position:absolute;top:0;left:0;background:rgba(0,0,0,0);transition:all .4s linear 0s}
.post-slide5:hover .post-img:before{background:rgba(0,0,0,.6)}
.post-slide5 .post-img img{width:100%;height:auto}
.post-slide5 .category{width:20%;font-size:16px;color:#fff;line-height:11px;text-align:center;text-transform:capitalize;padding:11px 0;background:#ff9412;position:absolute;bottom:0;left:-50%;transition:all .5s ease-in-out 0s}
.post-slide5:hover .category{left:0}
.post-slide5 .post-review{padding:25px 20px;background:#fff;position:relative}
.post-slide5 .post-title{margin:0}
.post-slide5 .post-title a{display:inline-block;font-size:16px;color:#ff9412;font-weight:700;letter-spacing:2px;text-transform:uppercase;margin-bottom:25px;transition:all .3s linear 0s}
.post-slide5 .post-title a:hover{text-decoration:none;color:#555}
.post-slide5 .post-description{font-size:15px;color:#555;line-height:26px}
.post-review .post-bar{margin-top:20px}
.post-bar span{display:inline-block;font-size:14px}
.post-bar span i{margin-right:5px;color:#999}
.post-bar span a{color:#999;text-transform:uppercase}
.post-bar span a:hover{text-decoration:none;color:#ff9412}
.post-bar span.comments{float:right}
@media only screen and (max-width:359px){.post-slide5 .category{font-size:13px}
}

/******************  News Slider Demo-6 *******************/
.post-slide6{margin:0 10px;border-left:8px solid #1dcfd1;border-bottom:8px solid #1dcfd1;box-shadow:0 1px 2px rgba(43,59,93,.3);margin-bottom:2em}
.post-slide6 .post-img{position:relative;overflow:hidden}
.post-slide6 .post-img:before{content:"";width:100%;height:100%;position:absolute;top:0;left:0;background:rgba(0,0,0,0);transition:all .4s linear 0s}
.post-slide6:hover .post-img:before{background:rgba(0,0,0,.6)}
.post-slide6 .post-img img{width:100%;height:auto}
.post-slide6 .post-info{width:75%;position:absolute;bottom:-100%;left:12.5%;background:#1dcfd1;text-align:center;line-height:26px;padding:15px;transition:bottom .4s ease-in-out 0s}
.post-slide6:hover .post-info{bottom:0}
.post-slide6 .category{padding:0;margin:0;list-style:none}
.post-slide6 .category li,.post-slide6 .post-date{display:inline-block;font-size:16px;color:#fff;text-transform:capitalize}
.post-slide6 .category li:after{content:" /"}
.post-slide6 .category li:last-child:after{content:""}
.post-slide6 .category li a{color:#fff;transition:all .4s linear}
.post-slide6 .category li a:hover{color:#555;text-decoration:none}
.post-slide6 .post-review{padding:35px 20px 25px;background:#fff;position:relative}
.post-slide6 .icons{width:90px;height:90px;border:4px solid #fff;border-radius:50%;position:absolute;top:-45px;right:10px;overflow:hidden}
.post-slide6 .icons img{width:100%;height:auto}
.post-slide6 .post-title{margin:0 0 25px 0}
.post-slide6 .post-title a{font-size:16px;font-weight:700;letter-spacing:2px;color:#1dcfd1;display:inline-block;text-transform:uppercase;transition:all .3s linear 0s}
.post-slide6 .post-title a:hover{text-decoration:none;color:#555}
.post-slide6 .post-description{color:#555;font-size:15px;line-height:26px;margin-bottom:20px}
.post-slide6 .read{font-size:13px;color:#555;display:block;text-align:right;text-transform:uppercase}
.post-slide6 .read:hover{text-decoration:none;color:#1dcfd1}

/******************  News Slider Demo-7 *******************/
.post-slide7{padding:0 10px;transform:translateY(0);transition:all .3s ease 0s}
.post-slide7:hover{transform:translateY(-10px)}
.post-slide7 .post-img{position:relative}
.post-slide7 .post-img img{width:100%;height:auto}
.post-slide7 .post-img:after{content:"";position:absolute;width:100%;height:100%;top:0;left:0;background:linear-gradient(to left,rgba(210,130,19,.7) ,rgba(170,55,114,.7));transform:translateY(-100%);transition:all .3s ease 0s}
.post-slide7:hover .post-img:after{transform:translateY(0)}
.post-slide7 .post-img:before{content:"\f002";font-family:"Font Awesome 5 Free";font-weight:900;width:100%;height:100%;text-align:center;position:absolute;top:-50%;font-size:30px;color:#fff;transition:all .5s ease 0s;z-index:1}
.post-slide7:hover .post-img:before{top:40%}
.post-slide7 .icons{position:absolute;bottom:-16px;left:30px;width:44px;height:44px;border-radius:50%;overflow:hidden;z-index:1}
.post-slide7 .icons img{width:100%;height:auto}
.post-slide7 .post-review{border:1px solid #9c4a6c;border-top:none;padding:35px 20px 25px;background:#fff;position:relative}
.post-slide7 .post-review:after{content:"";width:90%;height:10px;position:absolute;top:100%;left:5%;opacity:0;background:rgba(0,0,0,0) radial-gradient(ellipse at center center ,rgba(0,0,0,.35) 0,rgba(0,0,0,0) 80%);transform:translateY(0);transition:all .3s ease 0s}
.post-slide7:hover .post-review:after{opacity:1;transform:translateY(5px)}
.post-slide7 .post-bar{padding:0;list-style:none}
.post-slide7 .post-bar li{display:inline-block;font-size:16px;font-family:serif,Arial;color:#555;margin-right:10px;text-transform:capitalize}
.post-slide7 .post-bar li i{color:#9c4a6c;margin-right:8px}
.post-slide7 .post-title{margin:0 0 20px 0;color:#555;font-weight:700;font-size:18px}
.post-slide7 .post-description{font-size:15px;line-height:21px;color:grey}
.post-slide7 .read{text-transform:capitalize;font-size:15px;color:#9c4a6c}
.post-slide7 .read i{margin-left:10px}
.post-slide7 .read:hover{text-decoration:none;color:#333}

/******************  News Slider Demo-8 *******************/
.post-slide8{margin:0 15px;position:relative;background:#fff;box-shadow:0 1px 2px rgba(43,59,93,.3);margin-bottom:2em}
.post-slide8 .post-img{position:relative;overflow:hidden}
.post-slide8 .post-img img{width:100%;height:auto}
.post-slide8 .over-layer{position:absolute;top:0;left:0;width:100%;height:100%;opacity:0;background:rgba(0,0,0,.6);transition:all .3s ease}
.post-slide8:hover .over-layer{opacity:1}
.post-slide8 .post-link{margin:0;padding:0;position:relative;top:45%;text-align:center}
.post-slide8 .post-link li{display:inline-block;list-style:none;margin-right:20px}
.post-slide8 .post-link li a{color:#fff;font-size:20px}
.post-slide8 .post-link li a:hover{color:#ff8b3d;text-decoration:none}
.post-slide8 .post-date{position:absolute;top:10%;left:4%}
.post-slide8 .date{display:inline-block;border-radius:3px 0 0 3px;padding:5px 10px;color:#fff;font-size:20px;font-weight:700;text-align:center;background:#333;float:left}
.post-slide8 .month{display:inline-block;border-radius:0 3px 3px 0;padding:5px 13px;color:#111;font-size:20px;font-weight:700;background:#ff8b3d}
.post-slide8 .post-content{padding:30px}
.post-slide8 .post-title{margin:0 0 15px 0}
.post-slide8 .post-title a{font-size:18px;font-weight:700;color:#333;display:inline-block;text-transform:capitalize;transition:all .3s ease 0s}
.post-slide8 .post-title a:hover{text-decoration:none;color:#ff8b3d}
.post-slide8 .post-description{font-size:14px;line-height:24px;color:grey}
.post-slide8 .read-more{color:#333;font-size:14px;font-weight:700;text-transform:uppercase;position:relative;transition:color .2s linear}
.post-slide8 .read-more:hover{text-decoration:none;color:#ff8b3d}
.post-slide8 .read-more:after{content:"";position:absolute;width:30%;display:block;border:1px solid #ff8b3d;transition:all .3s ease}
.post-slide8 .read-more:hover:after{width:100%}
@media only screen and (max-width:479px){.post-slide8 .month{font-size:14px}
.post-slide8 .date{font-size:14px}
}

/******************  News Slider Demo-9 *******************/
.post-slide9{margin:0 10px;background:#fff;box-shadow:0 1px 2px rgba(43,59,93,.3);margin-bottom:2em}
.post-slide9 .post-img{overflow:hidden;position:relative}
.post-slide9 .post-img img{width:100%;height:auto;transform:scale(1,1);transition:all .3s ease 0s}
.post-slide9:hover .post-img img{transform:scale(1.2,1.2)}
.post-slide9 .over-layer{position:absolute;top:0;left:0;width:100%;height:100%;opacity:0;text-align:center;background:rgba(68,67,64,.9);transition:all .5s linear}
.post-slide9:hover .over-layer{opacity:1}
.post-slide9 .post-link{padding:0;margin:0;list-style:none;position:relative;top:45%}
.post-slide9 .post-link li{display:inline-block;margin-right:10px}
.post-slide9 .post-link li a{width:60px;height:60px;line-height:59px;border-radius:50%;color:#fff;background:#333;font-size:20px;transform:scale(1,1);transition:all .2s linear}
.post-slide9 .post-link li a:hover{text-decoration:none;transform:scale(1.1,1.1)}
.post-slide9 .post-review{padding:15px 0;overflow:hidden}
.post-slide9 .post-title{margin-top:0}
.post-slide9 .post-title a{display:block;color:#333;font-size:18px;text-align:center;font-weight:700;text-transform:uppercase;transition:all .5s ease 0s}
.post-slide9 .post-title a:hover{text-decoration:none;color:#1f80bb}
.post-slide9 .post-info{list-style:none;padding:10px 0 0 0;margin:0 0 7px 0;text-align:center;border-top:1px solid #d3d3d3}
.post-slide9 .post-info li{display:inline-block;margin-right:13px}
.post-slide9 .tag-info{margin:0;padding:0 0 10px 0;text-align:center;border-bottom:1px solid #d3d3d3}
.post-slide9 .tag-info li{list-style:none;display:inline-block}
.post-slide9 .tag-info li a{color:grey;text-transform:capitalize}
.post-slide9 .tag-info li a:hover{color:#1f80bb;text-decoration:none}
.post-slide9 .post-description{color:#828282;font-size:14px;padding:5px 25px;line-height:25px}
.post-slide9 .read-more{color:#333;float:right;font-weight:700;margin-right:25px;text-transform:capitalize}
.post-slide9 .read-more:hover{color:#1f80bb;text-decoration:none}
.owl-theme .owl-buttons div{position:relative;border-radius:0;background:#807b87;padding:7px 15px;transition:all .5s ease 0s}
.owl-theme .owl-buttons .owl-prev{position:absolute;left:0;top:50%;opacity:0;transition:all .5s linear}
.owl-carousel:hover .owl-buttons .owl-prev{opacity:1;left:-30px}
.owl-theme .owl-buttons .owl-next{position:absolute;right:0;top:50%;opacity:0;transition:all .5s linear}
.owl-carousel:hover .owl-buttons .owl-next{opacity:1;right:-30px}
.owl-next:before,.owl-prev:before{content:"\f053";font-family:"Font Awesome 5 Free";font-weight:900;color:#fff}
.owl-next:before{content:"\f054"}
@media only screen and (max-width:990px){.post-slide9 .post-info li{margin-right:5px}
.owl-theme .owl-buttons div{display:none}
}
@media only screen and (max-width:767px){.post-slide9 .post-link li a{width:40px;height:40px;line-height:39px;font-size:13px}
.post-slide9 .post-title a{font-size:14px}
}

/******************  News Slider Demo-10 *******************/
.post-slide10{padding-bottom:10px;margin:0 15px;position:relative;background:#fff!important;box-shadow:0 1px 2px rgba(43,59,93,.3);margin-bottom:2em}
.post-slide10 img{width:100%;height:auto}
.post-slide10 .post-date{position:absolute;top:2%;left:8%;padding:3% 5%;background:#e74c3c}
.post-slide10 .month{font-size:14px;color:#fff;font-weight:700;text-transform:uppercase}
.post-slide10 .month:after{content:"";display:block;border:1px solid #fff}
.post-slide10 .date{font-size:14px;color:#fff;display:block;text-align:center;font-weight:700}
.post-slide10 .post-title{margin:25px 0 15px 0}
.post-slide10 .post-title a{font-size:15px;font-weight:700;color:#333;padding:0 15px;display:inline-block;text-transform:uppercase;transition:all .3s ease 0s}
.post-slide10 .post-title a:hover{text-decoration:none;color:#e74c3c}
.post-slide10 .post-description{font-size:14px;line-height:24px;color:grey;padding:0 15px}
.post-slide10 .read-more{color:#333;padding:0 15px;text-transform:capitalize;transition:color .2s linear}
.post-slide10 .read-more i{margin-left:10px;font-size:10px}
.post-slide10 .read-more:hover{text-decoration:none;color:#e74c3c}
.owl-controls .owl-buttons{margin-top:20px;position:relative}
.owl-controls .owl-prev{position:absolute;left:-40px;bottom:230px;padding:8px 17px;background:#333;transition:background .5s ease}
.owl-controls .owl-next{position:absolute;right:-40px;bottom:230px;padding:8px 17px;background:#333;transition:background .5s ease}
.owl-controls .owl-next:after,.owl-controls .owl-prev:after{content:"\f104";font-family:FontAwesome;color:#d3d3d3;font-size:16px}
.owl-controls .owl-next:after{content:"\f105"}
.owl-controls .owl-next:hover,.owl-controls .owl-prev:hover{background:#e74c3c}
@media only screen and (max-width:990px){.post-slide10{margin:0 20px}
.owl-controls .owl-buttons .owl-prev{left:-20px;padding:5px 14px}
.owl-controls .owl-buttons .owl-next{right:-20px;padding:5px 14px}
}
@media only screen and (max-width:767px){.owl-controls .owl-buttons .owl-prev{left:0;bottom:260px}
.owl-controls .owl-buttons .owl-next{right:0;bottom:260px}
}

/******************  News Slider Demo-11 *******************/
.post-slide11{background:#fff;margin:0 15px;box-shadow:0 1px 2px rgba(43,59,93,.3);margin-bottom:2em}
.post-slide11 .post-img{position:relative}
.post-slide11 .over-layer{background:rgba(0,0,0,.6);width:100%;height:100%;position:absolute;opacity:0;cursor:pointer;transition:all .3s ease 0s}
.post-slide11:hover .over-layer{opacity:1}
.post-slide11 .over-layer:after{content:"+";font-size:52px;color:#fff;position:absolute;top:31%;left:42%}
.post-slide11 .post-img img{width:100%;height:auto}
.post-slide11 .post-title{margin:25px 0 15px 0;padding:0 15px}
.post-slide11 .post-title:before{content:"";border:2px solid #e67e22;width:18%;display:block;margin-bottom:15px}
.post-slide11 .post-title a{font-size:20px;font-weight:700;color:#333;display:inline-block;text-transform:capitalize;transition:all .3s ease 0s}
.post-slide11 .post-title a:hover{text-decoration:none;color:#e67e22}
.post-slide11 .post-date{text-transform:capitalize;padding:0 15px;color:#e67e22;font-size:13px}
.post-slide11 .post-date:before{margin-right:7px;color:#e67e22}
.owl-theme .owl-controls .owl-page.active span,.owl-theme .owl-controls.clickable .owl-page:hover span{background:#e67e22}

/******************  News Slider Demo-12 *******************/
.post-slide12{background:#fff;margin:0 15px;box-shadow:0 1px 2px rgba(43,59,93,.3);margin-bottom:2em}
.post-slide12 .post-img{position:relative;float:left;width:50%;height:auto}
.post-slide12 .over-layer{background:rgba(0,0,0,.6);width:100%;height:100%;position:absolute;opacity:0;cursor:pointer;transition:opacity .3s ease 0s}
.post-slide12 .over-layer:after{color:#fff;content:"+";font-size:52px;position:absolute;top:31%;left:42%}
.post-slide12 .post-img:hover .over-layer{opacity:1}
.post-slide12 .post-img img{width:100%;height:auto}
.post-slide12 .post-review{float:left;padding:1px 20px;width:50%}
.post-slide12 .post-title{margin:0 0 5px 0}
.post-slide12 .post-title a{color:#3498db;font-size:20px;font-weight:700;display:block;text-transform:capitalize;transition:color .3s ease}
.post-title>a:hover{text-decoration:none;color:#333}
.post-slide12 .post-date{display:block;font-size:15px;font-weight:700;margin-bottom:17px}
.post-description{color:#333;font-size:15px;font-weight:400;text-align:left}
.owl-pagination{margin-top:40px}
.owl-theme .owl-controls .owl-page.active span,.owl-theme .owl-controls.clickable .owl-page:hover span{background:#3498db}
@media only screen and (max-width:990px){.post-slide12 .over-layer:after{top:39%;left:45%}
}
@media only screen and (max-width:640px){.post-slide12 .post-img{width:100%}
.post-slide12 .post-review{width:100%;padding:10px}
}

/******************  News Slider Demo-13 *******************/
.post-slide13{padding:0 15px}
.post-slide13 .post-img{position:relative}
.post-slide13 .post-img>a{display:block}
.post-slide13 .post-img img{width:100%;height:auto}
.post-slide13 .post-img:hover:before{content:"";position:absolute;width:100%;height:100%;background-color:rgba(220,0,90,.6)}
.post-slide13 .post-img:after{content:"\f065";font-family:"Font Awesome 5 Free";font-weight:900;position:absolute;top:17px;right:20px;color:#fff;opacity:0;transform:scale(.8);transition:all .3s linear 0s}
.post-slide13 .post-img:hover:after{opacity:1;transform:scale(1)}
.post-slide13 .post-title{margin-top:20px}
.post-slide13 .post-title>a{color:#222;display:block;font-size:17px;font-weight:600;text-transform:uppercase}
.post-slide13 .post-title>a:hover{text-decoration:none;color:#dc005a}
.post-slide13 .post-bar{padding:0;list-style:none}
.post-slide13 .post-bar>li{display:inline-block}
.post-slide13 .author,.post-slide13 .author>a,.post-slide13 .post-date{color:#8f8f8f;font-size:12px;margin-right:16px;text-transform:uppercase;font-style:italic}
.post-slide13 .author>i,.post-slide13 .post-date>i{margin-right:5px}
.post-slide13 .author>a:hover{color:#dc005a}
.post-slide13 .post-description{color:#8f8f8f;font-size:14px;line-height:24px;padding-top:5px}
.post-slide13 .post-description:before{content:"";display:block;border-top:4px solid #dc005a;padding-bottom:12px;width:50px}
.owl-theme .owl-controls .owl-page span{width:52px;height:5px;border-radius:0;opacity:.5;margin-bottom:0}
.owl-theme .owl-controls .owl-page.active span,.owl-theme .owl-controls.clickable .owl-page:hover span{background:#dc005a;opacity:1}

/******************  News Slider Demo-14 *******************/
.post-slide14{border-width:1px 1px 5px;border-style:solid;border-color:#e67e22 #f0f0f0 #f0f0f0;border-radius:5px;margin:0 10px}
.post-slide14 .post-category{border-bottom:1px solid #f5f5f5;margin:0;text-align:center;padding:10px;font-size:15px;letter-spacing:2px;text-transform:capitalize}
.post-slide14 .post-category>a{text-transform:uppercase;color:#e67e22;transition:all .2s ease 0s}
.post-slide14 .post-category>a:hover{color:#373a3f}
.post-slide14 .post-review{overflow:hidden;padding:10px}
.post-slide14 .post-bar{width:60px;height:60px;border-radius:50%;background:#e67e22;float:left;line-height:34px;text-align:center;margin-right:10px}
.post-slide14 .post-bar>.month{display:block;color:#fff;font-size:10px;text-transform:capitalize}
.post-slide14 .post-bar>.date{color:#fff;display:block;font-size:28px;font-weight:700;line-height:12px}
.post-slide14 .post-title{line-height:20px;margin:10px 0 0 0}
.post-slide14 .post-title>a{font-size:17px;text-transform:uppercase;font-weight:700;line-height:10px;color:#333;transition:all .2s ease 0s}
.post-slide14 .post-title>a:hover{color:#e67e22}
.post-slide14 .post-img{filter:grayscale(0);transition:all .3s ease 0s}
.post-slide14 .post-img>img{width:100%;height:auto}
.post-slide14:hover .post-img{filter:grayscale(1)}
.post-slide14 .post-description{color:#555;font-size:14px;line-height:22px;padding:20px 35px}
</style>
@if(sizeof($Offers_)>=1)

    
<div class="container">
    <h3 class="h3">News Slider Demo - 1 </h3>
    <div class="row">
        <div class="col-md-12">
            <div id="news-slider" class="owl-carousel">
                <div class="post-slide">
                    <div class="post-img">
                        <a href="#">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo19/images/img-1.jpg" alt="">
                            <div class="post-date">
                                <span class="date">10</span>
                                <span class="month">jan</span>
                            </div>
                        </a>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-bar">
                            <li><i class="fa fa-user"></i><a href="#">admin</a></li>
                            <li><i class="fa fa-comment"></i><a href="#">5</a></li>
                        </ul>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad magni, nesciunt obcaecati possimus quasi quibusdam quos ratione sequi sit veritatis.</p>
                    </div>
                </div>
 
                <div class="post-slide">
                    <div class="post-img">
                        <a href="#">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo19/images/img-2.jpg" alt="">
                            <div class="post-date">
                                <span class="date">13</span>
                                <span class="month">jan</span>
                            </div>
                        </a>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-bar">
                            <li><i class="fa fa-user"></i><a href="#">admin</a></li>
                            <li><i class="fa fa-comment"></i><a href="#">7</a></li>
                        </ul>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad magni, nesciunt obcaecati possimus quasi quibusdam quos ratione sequi sit veritatis.</p>
                    </div>
                </div>
                <div class="post-slide">
                    <div class="post-img">
                        <a href="#">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo19/images/img-3.jpg" alt="">
                            <div class="post-date">
                                <span class="date">13</span>
                                <span class="month">jan</span>
                            </div>
                        </a>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-bar">
                            <li><i class="fa fa-user"></i><a href="#">admin</a></li>
                            <li><i class="fa fa-comment"></i><a href="#">7</a></li>
                        </ul>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad magni, nesciunt obcaecati possimus quasi quibusdam quos ratione sequi sit veritatis.</p>
                    </div>
                </div><div class="post-slide">
                    <div class="post-img">
                        <a href="#">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo19/images/img-3.jpg" alt="">
                            <div class="post-date">
                                <span class="date">13</span>
                                <span class="month">jan</span>
                            </div>
                        </a>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-bar">
                            <li><i class="fa fa-user"></i><a href="#">admin</a></li>
                            <li><i class="fa fa-comment"></i><a href="#">7</a></li>
                        </ul>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad magni, nesciunt obcaecati possimus quasi quibusdam quos ratione sequi sit veritatis.</p>
                    </div>
                </div><div class="post-slide">
                    <div class="post-img">
                        <a href="#">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo19/images/img-3.jpg" alt="">
                            <div class="post-date">
                                <span class="date">13</span>
                                <span class="month">jan</span>
                            </div>
                        </a>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-bar">
                            <li><i class="fa fa-user"></i><a href="#">admin</a></li>
                            <li><i class="fa fa-comment"></i><a href="#">7</a></li>
                        </ul>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad magni, nesciunt obcaecati possimus quasi quibusdam quos ratione sequi sit veritatis.</p>
                    </div>
                </div><div class="post-slide">
                    <div class="post-img">
                        <a href="#">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo19/images/img-3.jpg" alt="">
                            <div class="post-date">
                                <span class="date">13</span>
                                <span class="month">jan</span>
                            </div>
                        </a>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-bar">
                            <li><i class="fa fa-user"></i><a href="#">admin</a></li>
                            <li><i class="fa fa-comment"></i><a href="#">7</a></li>
                        </ul>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad magni, nesciunt obcaecati possimus quasi quibusdam quos ratione sequi sit veritatis.</p>
                    </div>
                </div><div class="post-slide">
                    <div class="post-img">
                        <a href="#">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo19/images/img-3.jpg" alt="">
                            <div class="post-date">
                                <span class="date">13</span>
                                <span class="month">jan</span>
                            </div>
                        </a>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-bar">
                            <li><i class="fa fa-user"></i><a href="#">admin</a></li>
                            <li><i class="fa fa-comment"></i><a href="#">7</a></li>
                        </ul>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad magni, nesciunt obcaecati possimus quasi quibusdam quos ratione sequi sit veritatis.</p>
                    </div>
                </div><div class="post-slide">
                    <div class="post-img">
                        <a href="#">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo19/images/img-3.jpg" alt="">
                            <div class="post-date">
                                <span class="date">13</span>
                                <span class="month">jan</span>
                            </div>
                        </a>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-bar">
                            <li><i class="fa fa-user"></i><a href="#">admin</a></li>
                            <li><i class="fa fa-comment"></i><a href="#">7</a></li>
                        </ul>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad magni, nesciunt obcaecati possimus quasi quibusdam quos ratione sequi sit veritatis.</p>
                    </div>
                </div><div class="post-slide">
                    <div class="post-img">
                        <a href="#">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo19/images/img-3.jpg" alt="">
                            <div class="post-date">
                                <span class="date">13</span>
                                <span class="month">jan</span>
                            </div>
                        </a>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-bar">
                            <li><i class="fa fa-user"></i><a href="#">admin</a></li>
                            <li><i class="fa fa-comment"></i><a href="#">7</a></li>
                        </ul>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad magni, nesciunt obcaecati possimus quasi quibusdam quos ratione sequi sit veritatis.</p>
                    </div>
                </div><div class="post-slide">
                    <div class="post-img">
                        <a href="#">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo19/images/img-3.jpg" alt="">
                            <div class="post-date">
                                <span class="date">13</span>
                                <span class="month">jan</span>
                            </div>
                        </a>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-bar">
                            <li><i class="fa fa-user"></i><a href="#">admin</a></li>
                            <li><i class="fa fa-comment"></i><a href="#">7</a></li>
                        </ul>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad magni, nesciunt obcaecati possimus quasi quibusdam quos ratione sequi sit veritatis.</p>
                    </div>
                </div><div class="post-slide">
                    <div class="post-img">
                        <a href="#">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo19/images/img-3.jpg" alt="">
                            <div class="post-date">
                                <span class="date">13</span>
                                <span class="month">jan</span>
                            </div>
                        </a>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-bar">
                            <li><i class="fa fa-user"></i><a href="#">admin</a></li>
                            <li><i class="fa fa-comment"></i><a href="#">7</a></li>
                        </ul>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad magni, nesciunt obcaecati possimus quasi quibusdam quos ratione sequi sit veritatis.</p>
                    </div>
                </div><div class="post-slide">
                    <div class="post-img">
                        <a href="#">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo19/images/img-3.jpg" alt="">
                            <div class="post-date">
                                <span class="date">13</span>
                                <span class="month">jan</span>
                            </div>
                        </a>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-bar">
                            <li><i class="fa fa-user"></i><a href="#">admin</a></li>
                            <li><i class="fa fa-comment"></i><a href="#">7</a></li>
                        </ul>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad magni, nesciunt obcaecati possimus quasi quibusdam quos ratione sequi sit veritatis.</p>
                    </div>
                </div><div class="post-slide">
                    <div class="post-img">
                        <a href="#">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo19/images/img-3.jpg" alt="">
                            <div class="post-date">
                                <span class="date">13</span>
                                <span class="month">jan</span>
                            </div>
                        </a>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-bar">
                            <li><i class="fa fa-user"></i><a href="#">admin</a></li>
                            <li><i class="fa fa-comment"></i><a href="#">7</a></li>
                        </ul>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad magni, nesciunt obcaecati possimus quasi quibusdam quos ratione sequi sit veritatis.</p>
                    </div>
                </div><div class="post-slide">
                    <div class="post-img">
                        <a href="#">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo19/images/img-3.jpg" alt="">
                            <div class="post-date">
                                <span class="date">13</span>
                                <span class="month">jan</span>
                            </div>
                        </a>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-bar">
                            <li><i class="fa fa-user"></i><a href="#">admin</a></li>
                            <li><i class="fa fa-comment"></i><a href="#">7</a></li>
                        </ul>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad magni, nesciunt obcaecati possimus quasi quibusdam quos ratione sequi sit veritatis.</p>
                    </div>
                </div><div class="post-slide">
                    <div class="post-img">
                        <a href="#">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo19/images/img-3.jpg" alt="">
                            <div class="post-date">
                                <span class="date">13</span>
                                <span class="month">jan</span>
                            </div>
                        </a>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-bar">
                            <li><i class="fa fa-user"></i><a href="#">admin</a></li>
                            <li><i class="fa fa-comment"></i><a href="#">7</a></li>
                        </ul>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad magni, nesciunt obcaecati possimus quasi quibusdam quos ratione sequi sit veritatis.</p>
                    </div>
                </div><div class="post-slide">
                    <div class="post-img">
                        <a href="#">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo19/images/img-3.jpg" alt="">
                            <div class="post-date">
                                <span class="date">13</span>
                                <span class="month">jan</span>
                            </div>
                        </a>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-bar">
                            <li><i class="fa fa-user"></i><a href="#">admin</a></li>
                            <li><i class="fa fa-comment"></i><a href="#">7</a></li>
                        </ul>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad magni, nesciunt obcaecati possimus quasi quibusdam quos ratione sequi sit veritatis.</p>
                    </div>
                </div><div class="post-slide">
                    <div class="post-img">
                        <a href="#">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo19/images/img-3.jpg" alt="">
                            <div class="post-date">
                                <span class="date">13</span>
                                <span class="month">jan</span>
                            </div>
                        </a>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-bar">
                            <li><i class="fa fa-user"></i><a href="#">admin</a></li>
                            <li><i class="fa fa-comment"></i><a href="#">7</a></li>
                        </ul>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad magni, nesciunt obcaecati possimus quasi quibusdam quos ratione sequi sit veritatis.</p>
                    </div>
                </div><div class="post-slide">
                    <div class="post-img">
                        <a href="#">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo19/images/img-3.jpg" alt="">
                            <div class="post-date">
                                <span class="date">13</span>
                                <span class="month">jan</span>
                            </div>
                        </a>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-bar">
                            <li><i class="fa fa-user"></i><a href="#">admin</a></li>
                            <li><i class="fa fa-comment"></i><a href="#">7</a></li>
                        </ul>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad magni, nesciunt obcaecati possimus quasi quibusdam quos ratione sequi sit veritatis.</p>
                    </div>
                </div><div class="post-slide">
                    <div class="post-img">
                        <a href="#">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo19/images/img-3.jpg" alt="">
                            <div class="post-date">
                                <span class="date">13</span>
                                <span class="month">jan</span>
                            </div>
                        </a>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-bar">
                            <li><i class="fa fa-user"></i><a href="#">admin</a></li>
                            <li><i class="fa fa-comment"></i><a href="#">7</a></li>
                        </ul>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad magni, nesciunt obcaecati possimus quasi quibusdam quos ratione sequi sit veritatis.</p>
                    </div>
                </div><div class="post-slide">
                    <div class="post-img">
                        <a href="#">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo19/images/img-3.jpg" alt="">
                            <div class="post-date">
                                <span class="date">13</span>
                                <span class="month">jan</span>
                            </div>
                        </a>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-bar">
                            <li><i class="fa fa-user"></i><a href="#">admin</a></li>
                            <li><i class="fa fa-comment"></i><a href="#">7</a></li>
                        </ul>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad magni, nesciunt obcaecati possimus quasi quibusdam quos ratione sequi sit veritatis.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="demo">
    <div class="container">
        <h3 class="h3">News slider Demo - 2 </h3>    
        <div class="row">
            <div class="col-md-12">
                <div id="news-slider2" class="owl-carousel">
                    <div class="post-slide2">
                        <div class="post-img">
                            <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-1.jpg" alt=""></a>
                        </div>
                        <div class="post-content">
                            <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                            <p class="post-description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec elementum mauris. Praesent vehicula gravida dolor, ac efficitur sem sagittis.
                            </p>
                            <ul class="post-bar">
                                <li><i class="fa fa-calendar"></i> June 5, 2016</li>
                                <li>
                                    <i class="fa fa-folder"></i>
                                    <a href="#">Mockup</a>
                                    <a href="#">Graphics</a>
                                    <a href="#">Flayers</a>
                                </li>
                            </ul>
                            <a href="#" class="read-more">read more</a>
                        </div>
                    </div>
 
                    <div class="post-slide2">
                        <div class="post-img">
                            <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-2.jpg" alt=""></a>
                        </div>
                        <div class="post-content">
                            <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                            <p class="post-description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec elementum mauris. Praesent vehicula gravida dolor, ac efficitur sem sagittis.
                            </p>
                            <ul class="post-bar">
                                <li><i class="fa fa-calendar"></i> June 7, 2016</li>
                                <li>
                                    <i class="fa fa-folder"></i>
                                    <a href="#">Mockup</a>
                                    <a href="#">Graphics</a>
                                    <a href="#">Flayers</a>
                                </li>
                            </ul>
                            <a href="#" class="read-more">read more</a>
                        </div>
                    </div>
                    
                    <div class="post-slide2">
                        <div class="post-img">
                            <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-3.jpg" alt=""></a>
                        </div>
                        <div class="post-content">
                            <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                            <p class="post-description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec elementum mauris. Praesent vehicula gravida dolor, ac efficitur sem sagittis.
                            </p>
                            <ul class="post-bar">
                                <li><i class="fa fa-calendar"></i> June 5, 2016</li>
                                <li>
                                    <i class="fa fa-folder"></i>
                                    <a href="#">Mockup</a>
                                    <a href="#">Graphics</a>
                                    <a href="#">Flayers</a>
                                </li>
                            </ul>
                            <a href="#" class="read-more">read more</a>
                        </div>
                    </div>
                    
                    <div class="post-slide2">
                        <div class="post-img">
                            <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-4.jpg" alt=""></a>
                        </div>
                        <div class="post-content">
                            <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                            <p class="post-description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec elementum mauris. Praesent vehicula gravida dolor, ac efficitur sem sagittis.
                            </p>
                            <ul class="post-bar">
                                <li><i class="fa fa-calendar"></i> June 5, 2016</li>
                                <li>
                                    <i class="fa fa-folder"></i>
                                    <a href="#">Mockup</a>
                                    <a href="#">Graphics</a>
                                    <a href="#">Flayers</a>
                                </li>
                            </ul>
                            <a href="#" class="read-more">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="container">
    <h3 class="h3">New slider Demo - 3</h3>
    <div class="row">
        <div class="col-md-12">
            <div id="news-slider3" class="owl-carousel">
                <div class="post-slide3">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo32/images/img-1.jpg" alt="">
                        <span class="post-icon">
                            <i class="fa fa-book"></i>
                        </span>
                    </div>
                    <ul class="post-bar">
                        <li>may 2, 2016</li>
                        <li>
                            <a href="#">WebDesign</a>
                            <a href="#">php</a>
                        </li>
                    </ul>
                    <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                    <p class="post-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec elementum mauris. Praesent vehicula gravida dolor, ac efficitur sem sagittis.
                    </p>
                    <a href="#" class="read-more">
                        <i class="fa fa-long-arrow-right"></i>
                        <span>read more</span>
                    </a>
                </div>
 
                <div class="post-slide3">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo32/images/img-2.jpg" alt="">
                        <span class="post-icon">
                            <i class="fa fa-book"></i>
                        </span>
                    </div>
                    <ul class="post-bar">
                        <li>may 4, 2016</li>
                        <li>
                            <a href="#">WebDesign</a>
                            <a href="#">php</a>
                        </li>
                    </ul>
                    <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                    <p class="post-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec elementum mauris. Praesent vehicula gravida dolor, ac efficitur sem sagittis.
                    </p>
                    <a href="#" class="read-more">
                        <i class="fa fa-long-arrow-right"></i>
                        <span>read more</span>
                    </a>
                </div>
                
                <div class="post-slide3">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo32/images/img-3.jpg" alt="">
                        <span class="post-icon">
                            <i class="fa fa-book"></i>
                        </span>
                    </div>
                    <ul class="post-bar">
                        <li>may 4, 2016</li>
                        <li>
                            <a href="#">WebDesign</a>
                            <a href="#">php</a>
                        </li>
                    </ul>
                    <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                    <p class="post-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec elementum mauris. Praesent vehicula gravida dolor, ac efficitur sem sagittis.
                    </p>
                    <a href="#" class="read-more">
                        <i class="fa fa-long-arrow-right"></i>
                        <span>read more</span>
                    </a>
                </div>
                
                <div class="post-slide3">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo32/images/img-4.jpg" alt="">
                        <span class="post-icon">
                            <i class="fa fa-book"></i>
                        </span>
                    </div>
                    <ul class="post-bar">
                        <li>may 4, 2016</li>
                        <li>
                            <a href="#">WebDesign</a>
                            <a href="#">php</a>
                        </li>
                    </ul>
                    <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                    <p class="post-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec elementum mauris. Praesent vehicula gravida dolor, ac efficitur sem sagittis.
                    </p>
                    <a href="#" class="read-more">
                        <i class="fa fa-long-arrow-right"></i>
                        <span>read more</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="container">
    <h3 class="h3">New slider Demo - 4</h3>
    <div class="row">
        <div class="col-md-12">
            <div id="news-slider4" class="owl-carousel">
                <div class="post-slide4">
                    <ul class="post-info">
                        <li><i class="fa fa-tag"></i><a href="#">java</a>,<a href="#">php</a></li>
                        <li><i class="fa fa-calendar"></i><a href="#">June 10, 2016</a></li>
                        <li><i class="fa fa-comment"></i><a href="#">1</a></li>
                    </ul>
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo31/images/img-1.jpg" alt="">
                        <a href="#" class="read">read more</a>
                    </div>
                    <div class="post-content">
                        <span class="post-author">
                            <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo31/images/img-5.jpg" alt=""></a>
                        </span>
                        <h3 class="post-title">Latest News Post</h3>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore ducimus est, excepturi nam odit possimus? Accusantium, aut beatae commodi dolore dolores esse fugit id illum ipsam nemo nesciunt obcaecati officiis praesentium provident quasi quis quo repellat sapiente sequi temporibus voluptates.</p>
                    </div>
                </div>
 
                <div class="post-slide4">
                    <ul class="post-info">
                        <li><i class="fa fa-tag"></i><a href="#">java</a>,<a href="#">php</a></li>
                        <li><i class="fa fa-calendar"></i><a href="#">June 12, 2016</a></li>
                        <li><i class="fa fa-comment"></i><a href="#">3</a></li>
                    </ul>
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo31/images/img-2.jpg" alt="">
                        <a href="#" class="read">read more</a>
                    </div>
                    <div class="post-content">
                        <span class="post-author">
                            <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo31/images/img-6.jpg" alt=""></a>
                        </span>
                        <h3 class="post-title">Latest News Post</h3>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore ducimus est, excepturi nam odit possimus? Accusantium, aut beatae commodi dolore dolores esse fugit id illum ipsam nemo nesciunt obcaecati officiis praesentium provident quasi quis quo repellat sapiente sequi temporibus voluptates.</p>
                    </div>
                </div>
                
                <div class="post-slide4">
                    <ul class="post-info">
                        <li><i class="fa fa-tag"></i><a href="#">java</a>,<a href="#">php</a></li>
                        <li><i class="fa fa-calendar"></i><a href="#">June 12, 2016</a></li>
                        <li><i class="fa fa-comment"></i><a href="#">3</a></li>
                    </ul>
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo31/images/img-3.jpg" alt="">
                        <a href="#" class="read">read more</a>
                    </div>
                    <div class="post-content">
                        <span class="post-author">
                            <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo31/images/img-7.jpg" alt=""></a>
                        </span>
                        <h3 class="post-title">Latest News Post</h3>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore ducimus est, excepturi nam odit possimus? Accusantium, aut beatae commodi dolore dolores esse fugit id illum ipsam nemo nesciunt obcaecati officiis praesentium provident quasi quis quo repellat sapiente sequi temporibus voluptates.</p>
                    </div>
                </div>
                
                <div class="post-slide4">
                    <ul class="post-info">
                        <li><i class="fa fa-tag"></i><a href="#">java</a>,<a href="#">php</a></li>
                        <li><i class="fa fa-calendar"></i><a href="#">June 12, 2016</a></li>
                        <li><i class="fa fa-comment"></i><a href="#">3</a></li>
                    </ul>
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo31/images/img-4.jpg" alt="">
                        <a href="#" class="read">read more</a>
                    </div>
                    <div class="post-content">
                        <span class="post-author">
                            <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo31/images/img-7.jpg" alt=""></a>
                        </span>
                        <h3 class="post-title">Latest News Post</h3>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore ducimus est, excepturi nam odit possimus? Accusantium, aut beatae commodi dolore dolores esse fugit id illum ipsam nemo nesciunt obcaecati officiis praesentium provident quasi quis quo repellat sapiente sequi temporibus voluptates.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="container">
    <h3 class="h3">New slider Demo - 5</h3>
    <div class="row">
        <div class="col-md-12">
            <div id="news-slider5" class="owl-carousel">
                <div class="post-slide5">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo30/images/img-1.jpg" alt="">
                        <div class="category">HTML</div>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <p class="post-description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda culpa cumque dicta sint soluta voluptas eius iusto modi reprehenderit sint soluta voluptas.
                        </p>
                        <div class="post-bar">
                            <span><i class="fa fa-user"></i> <a href="#">Williamson</a></span>
                            <span class="comments"><i class="fa fa-comments"></i> <a href="#">2 Comments</a></span>
                        </div>
                    </div>
                </div>
 
                <div class="post-slide5">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo30/images/img-2.jpg" alt="">
                        <div class="category">CSS</div>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <p class="post-description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda culpa cumque dicta sint soluta voluptas eius iusto modi reprehenderit sint soluta voluptas.
                        </p>
                        <div class="post-bar">
                            <span><i class="fa fa-user"></i> <a href="#">Kristiana</a></span>
                            <span class="comments"><i class="fa fa-comments"></i> <a href="#">4 Comments</a></span>
                        </div>
                    </div>
                </div>
                
                <div class="post-slide5">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo30/images/img-3.jpg" alt="">
                        <div class="category">CSS</div>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <p class="post-description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda culpa cumque dicta sint soluta voluptas eius iusto modi reprehenderit sint soluta voluptas.
                        </p>
                        <div class="post-bar">
                            <span><i class="fa fa-user"></i> <a href="#">Kristiana</a></span>
                            <span class="comments"><i class="fa fa-comments"></i> <a href="#">4 Comments</a></span>
                        </div>
                    </div>
                </div>
                
                <div class="post-slide5">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo30/images/img-4.jpg" alt="">
                        <div class="category">CSS</div>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <p class="post-description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda culpa cumque dicta sint soluta voluptas eius iusto modi reprehenderit sint soluta voluptas.
                        </p>
                        <div class="post-bar">
                            <span><i class="fa fa-user"></i> <a href="#">Kristiana</a></span>
                            <span class="comments"><i class="fa fa-comments"></i> <a href="#">4 Comments</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="container">
    <h3 class="h3">New slider Demo - 6</h3>
    <div class="row">
        <div class="col-md-12">
            <div id="news-slider6" class="owl-carousel">
                <div class="post-slide6">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo28/images/img-1.jpg" alt="">
                        <div class="post-info">
                            <ul class="category">
                                <li>in <a href="#">Graphics</a></li>
                                <li>by <a href="#">admin</a></li>
                            </ul>
                            <span class="post-date">May 05, 2016</span>
                        </div>
                    </div>
                    <div class="post-review">
                        <span class="icons">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo28/images/img-5.jpg" alt="">
                        </span>
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda culpa cumque dicta sint soluta voluptas eius iusto modi reprehenderit sint soluta voluptas.</p>
                        <a href="#" class="read">read more</a>
                    </div>
                </div>
 
                <div class="post-slide6">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo28/images/img-2.jpg" alt="">
                        <div class="post-info">
                            <ul class="category">
                                <li>in <a href="#">Graphics</a></li>
                                <li>by <a href="#">admin</a></li>
                            </ul>
                            <span class="post-date">May 07, 2016</span>
                        </div>
                    </div>
                    <div class="post-review">
                        <span class="icons">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo28/images/img-6.jpg" alt="">
                        </span>
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda culpa cumque dicta sint soluta voluptas eius iusto modi reprehenderit sint soluta voluptas.</p>
                        <a href="#" class="read">read more</a>
                    </div>
                </div>
                
                <div class="post-slide6">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo28/images/img-3.jpg" alt="">
                        <div class="post-info">
                            <ul class="category">
                                <li>in <a href="#">Graphics</a></li>
                                <li>by <a href="#">admin</a></li>
                            </ul>
                            <span class="post-date">May 07, 2016</span>
                        </div>
                    </div>
                    <div class="post-review">
                        <span class="icons">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo28/images/img-6.jpg" alt="">
                        </span>
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda culpa cumque dicta sint soluta voluptas eius iusto modi reprehenderit sint soluta voluptas.</p>
                        <a href="#" class="read">read more</a>
                    </div>
                </div>
                
                <div class="post-slide6">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo28/images/img-4.jpg" alt="">
                        <div class="post-info">
                            <ul class="category">
                                <li>in <a href="#">Graphics</a></li>
                                <li>by <a href="#">admin</a></li>
                            </ul>
                            <span class="post-date">May 07, 2016</span>
                        </div>
                    </div>
                    <div class="post-review">
                        <span class="icons">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo28/images/img-7.jpg" alt="">
                        </span>
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda culpa cumque dicta sint soluta voluptas eius iusto modi reprehenderit sint soluta voluptas.</p>
                        <a href="#" class="read">read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="container">
    <h3 class="h3">New slider Demo - 7</h3>
    <div class="row">
        <div class="col-md-12">
            <div id="news-slider7" class="owl-carousel">
                <div class="post-slide7">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo26/images/img-1.jpg" alt="">
                        <span class="icons">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo26/images/img-5.jpg" alt="">
                        </span>
                    </div>
                    <div class="post-review">
                        <ul class="post-bar">
                            <li><i class="fa fa-calendar"></i>Apr 2, 2016</li>
                            <li><i class="fa fa-user"></i> admin</li>
                        </ul>
                        <h3 class="post-title">Latest News Post</h3>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cum hic officia quaerat sapiente, vitae. </p>
                        <a href="#" class="read">read more<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
 
                <div class="post-slide7">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo26/images/img-2.jpg" alt="">
                        <span class="icons">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo26/images/img-6.jpg" alt="">
                        </span>
                    </div>
                    <div class="post-review">
                        <ul class="post-bar">
                            <li><i class="fa fa-calendar"></i>Apr 5, 2016</li>
                            <li><i class="fa fa-user"></i> admin</li>
                        </ul>
                        <h3 class="post-title">Latest News Post</h3>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cum hic officia quaerat sapiente, vitae. </p>
                        <a href="#" class="read">read more<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                
                <div class="post-slide7">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo26/images/img-3.jpg" alt="">
                        <span class="icons">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo26/images/img-5.jpg" alt="">
                        </span>
                    </div>
                    <div class="post-review">
                        <ul class="post-bar">
                            <li><i class="fa fa-calendar"></i>Apr 5, 2016</li>
                            <li><i class="fa fa-user"></i> admin</li>
                        </ul>
                        <h3 class="post-title">Latest News Post</h3>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cum hic officia quaerat sapiente, vitae. </p>
                        <a href="#" class="read">read more<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                
                <div class="post-slide7">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo26/images/img-4.jpg" alt="">
                        <span class="icons">
                            <img src="http://bestjquery.com/tutorial/news-slider/demo26/images/img-6.jpg" alt="">
                        </span>
                    </div>
                    <div class="post-review">
                        <ul class="post-bar">
                            <li><i class="fa fa-calendar"></i>Apr 5, 2016</li>
                            <li><i class="fa fa-user"></i> admin</li>
                        </ul>
                        <h3 class="post-title">Latest News Post</h3>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cum hic officia quaerat sapiente, vitae. </p>
                        <a href="#" class="read">read more<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="container">
    <h3 class="h3">New slider Demo - 8</h3>
    <div class="row">
        <div class="col-md-12">
            <div id="news-slider8" class="owl-carousel">
                <div class="post-slide8">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo24/images/img-1.jpg" alt="">
                        <div class="over-layer">
                            <ul class="post-link">
                                <li><a href="#" class="fa fa-search"></a></li>
                                <li><a href="#" class="fa fa-link"></a></li>
                            </ul>
                        </div>
                        <div class="post-date">
                            <span class="date">3</span>
                            <span class="month">Mar</span>
                        </div>
                    </div>
                    <div class="post-content">
                        <h3 class="post-title">
                            <a href="#">Latest News Post</a>
                        </h3>
                        <p class="post-description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......
                        </p>
                        <a href="#" class="read-more">read more</a>
                    </div>
                </div>
 
                <div class="post-slide8">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo24/images/img-2.jpg" alt="">
                        <div class="over-layer">
                            <ul class="post-link">
                                <li><a href="#" class="fa fa-search"></a></li>
                                <li><a href="#" class="fa fa-link"></a></li>
                            </ul>
                        </div>
                        <div class="post-date">
                            <span class="date">5</span>
                            <span class="month">Mar</span>
                        </div>
                    </div>
                    <div class="post-content">
                        <h3 class="post-title">
                            <a href="#">Latest News Post</a>
                        </h3>
                        <p class="post-description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......
                        </p>
                        <a href="#" class="read-more">read more</a>
                    </div>
                </div>
                
                <div class="post-slide8">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo24/images/img-3.jpg" alt="">
                        <div class="over-layer">
                            <ul class="post-link">
                                <li><a href="#" class="fa fa-search"></a></li>
                                <li><a href="#" class="fa fa-link"></a></li>
                            </ul>
                        </div>
                        <div class="post-date">
                            <span class="date">5</span>
                            <span class="month">Mar</span>
                        </div>
                    </div>
                    <div class="post-content">
                        <h3 class="post-title">
                            <a href="#">Latest News Post</a>
                        </h3>
                        <p class="post-description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......
                        </p>
                        <a href="#" class="read-more">read more</a>
                    </div>
                </div>
                
                <div class="post-slide8">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo24/images/img-4.jpg" alt="">
                        <div class="over-layer">
                            <ul class="post-link">
                                <li><a href="#" class="fa fa-search"></a></li>
                                <li><a href="#" class="fa fa-link"></a></li>
                            </ul>
                        </div>
                        <div class="post-date">
                            <span class="date">5</span>
                            <span class="month">Mar</span>
                        </div>
                    </div>
                    <div class="post-content">
                        <h3 class="post-title">
                            <a href="#">Latest News Post</a>
                        </h3>
                        <p class="post-description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......
                        </p>
                        <a href="#" class="read-more">read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="container">
    <h3 class="h3">New slider Demo - 9</h3>
    <div class="row">
        <div class="col-md-12">
            <div id="news-slider9" class="owl-carousel">
                <div class="post-slide9">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo21/images/img-1.jpg" alt="">
                        <div class="over-layer">
                            <ul class="post-link">
                                <li><a href="#" class="fa fa-search"></a></li>
                                <li><a href="#" class="fa fa-link"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-info">
                            <li>Comment: 2</li>
                            <li>Date: Feb 21, 2016</li>
                            <li>Author:Williamson</li>
                        </ul>
                        <ul class="tag-info">
                            <li>Tags:</li>
                            <li><a href="">Mockups,</a></li>
                            <li><a href="">Graphics,</a></li>
                            <li><a href="">Web Projects</a></li>
                        </ul>
                        <p class="post-description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eleifend a massa rhoncus gravida. Nullam in viverra sapien. Nunc bibendum nec lectus et vulputate. Nam.
                        </p>
                        <a href="#" class="read-more">read more</a>
                    </div>
                </div>
 
                <div class="post-slide9">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo21/images/img-2.jpg" alt="">
                        <div class="over-layer">
                            <ul class="post-link">
                                <li><a href="#" class="fa fa-search"></a></li>
                                <li><a href="#" class="fa fa-link"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-info">
                            <li>Comment: 4</li>
                            <li>Date: Feb 25, 2016</li>
                            <li>Author:Kristiana</li>
                        </ul>
                        <ul class="tag-info">
                            <li>Tags:</li>
                            <li><a href="">Mockups,</a></li>
                            <li><a href="">Graphics,</a></li>
                            <li><a href="">Web Projects</a></li>
                        </ul>
                        <p class="post-description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eleifend a massa rhoncus gravida. Nullam in viverra sapien. Nunc bibendum nec lectus et vulputate. Nam.
                        </p>
                        <a href="#" class="read-more">read more</a>
                    </div>
                </div>
                
                <div class="post-slide9">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo21/images/img-3.jpg" alt="">
                        <div class="over-layer">
                            <ul class="post-link">
                                <li><a href="#" class="fa fa-search"></a></li>
                                <li><a href="#" class="fa fa-link"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-info">
                            <li>Comment: 4</li>
                            <li>Date: Feb 25, 2016</li>
                            <li>Author:Kristiana</li>
                        </ul>
                        <ul class="tag-info">
                            <li>Tags:</li>
                            <li><a href="">Mockups,</a></li>
                            <li><a href="">Graphics,</a></li>
                            <li><a href="">Web Projects</a></li>
                        </ul>
                        <p class="post-description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eleifend a massa rhoncus gravida. Nullam in viverra sapien. Nunc bibendum nec lectus et vulputate. Nam.
                        </p>
                        <a href="#" class="read-more">read more</a>
                    </div>
                </div>
                
                <div class="post-slide9">
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo21/images/img-1.jpg" alt="">
                        <div class="over-layer">
                            <ul class="post-link">
                                <li><a href="#" class="fa fa-search"></a></li>
                                <li><a href="#" class="fa fa-link"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <ul class="post-info">
                            <li>Comment: 4</li>
                            <li>Date: Feb 25, 2016</li>
                            <li>Author:Kristiana</li>
                        </ul>
                        <ul class="tag-info">
                            <li>Tags:</li>
                            <li><a href="">Mockups,</a></li>
                            <li><a href="">Graphics,</a></li>
                            <li><a href="">Web Projects</a></li>
                        </ul>
                        <p class="post-description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eleifend a massa rhoncus gravida. Nullam in viverra sapien. Nunc bibendum nec lectus et vulputate. Nam.
                        </p>
                        <a href="#" class="read-more">read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="container">
    <h3 class="h3">New slider Demo - 10</h3>
    <div class="row">
        <div class="col-md-12">
            <div id="news-slider10" class="owl-carousel">
                <div class="post-slide10">
                    <img src="http://bestjquery.com/tutorial/news-slider/demo18/images/img-1.jpg" alt="">
                    <div class="post-date">
                        <span class="month">Nov</span>
                        <span class="date">5</span>
                    </div>
                    <h3 class="post-title">
                        <a href="#">Lorem ipsum dolor sit amet, consectetur.</a>
                    </h3>
                    <p class="post-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......
                    </p>
                    <a href="#" class="read-more">read more<i class="fa fa-chevron-right"></i></a>
                </div>
 
                <div class="post-slide10">
                    <img src="http://bestjquery.com/tutorial/news-slider/demo18/images/img-2.jpg" alt="">
                    <div class="post-date">
                        <span class="month">Nov</span>
                        <span class="date">8</span>
                    </div>
                    <h3 class="post-title">
                        <a href="#">Lorem ipsum dolor sit amet, consectetur.</a>
                    </h3>
                    <p class="post-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......
                    </p>
                    <a href="#" class="read-more">read more<i class="fa fa-chevron-right"></i></a>
                </div>
                
                <div class="post-slide10">
                    <img src="http://bestjquery.com/tutorial/news-slider/demo18/images/img-3.jpg" alt="">
                    <div class="post-date">
                        <span class="month">Nov</span>
                        <span class="date">8</span>
                    </div>
                    <h3 class="post-title">
                        <a href="#">Lorem ipsum dolor sit amet, consectetur.</a>
                    </h3>
                    <p class="post-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......
                    </p>
                    <a href="#" class="read-more">read more<i class="fa fa-chevron-right"></i></a>
                </div>
                
                <div class="post-slide10">
                    <img src="http://bestjquery.com/tutorial/news-slider/demo18/images/img-4.jpg" alt="">
                    <div class="post-date">
                        <span class="month">Nov</span>
                        <span class="date">8</span>
                    </div>
                    <h3 class="post-title">
                        <a href="#">Lorem ipsum dolor sit amet, consectetur.</a>
                    </h3>
                    <p class="post-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......
                    </p>
                    <a href="#" class="read-more">read more<i class="fa fa-chevron-right"></i></a>
                </div>
                
                <div class="post-slide10">
                    <img src="http://bestjquery.com/tutorial/news-slider/demo18/images/img-5.jpg" alt="">
                    <div class="post-date">
                        <span class="month">Nov</span>
                        <span class="date">8</span>
                    </div>
                    <h3 class="post-title">
                        <a href="#">Lorem ipsum dolor sit amet, consectetur.</a>
                    </h3>
                    <p class="post-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......
                    </p>
                    <a href="#" class="read-more">read more<i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="container">
    <h3 class="h3">New slider Demo - 11</h3>
    <div class="row">
        <div class="col-md-12">
            <div id="news-slider11" class="owl-carousel">
                <div class="post-slide11">
                    <div class="post-img">
                        <span class="over-layer"></span>
                        <img src="http://bestjquery.com/tutorial/news-slider/demo16/images/img-1.jpg" alt="">
                    </div>
                    <h3 class="post-title">
                        <a href="#">Lorem ipsum dolor sit amet, consectetur.</a>
                    </h3>
                    <span class="post-date"><i class="fa fa-calendar"></i> july 11, 2015</span>
                </div>
 
                <div class="post-slide11">
                    <div class="post-img">
                        <span class="over-layer"></span>
                        <img src="http://bestjquery.com/tutorial/news-slider/demo16/images/img-2.jpg" alt="">
                    </div>
                    <h3 class="post-title">
                        <a href="#">Lorem ipsum dolor sit amet, consectetur.</a>
                    </h3>
                    <span class="post-date"><i class="fa fa-calendar"></i> july 15, 2015</span>
                </div>
 
                <div class="post-slide11">
                    <div class="post-img">
                        <span class="over-layer"></span>
                        <img src="http://bestjquery.com/tutorial/news-slider/demo16/images/img-3.jpg" alt="">
                    </div>
                    <h3 class="post-title">
                        <a href="#">Lorem ipsum dolor sit amet, consectetur.</a>
                    </h3>
                    <span class="post-date"><i class="fa fa-calendar"></i> july 17, 2015</span>
                </div>
                
                <div class="post-slide11">
                    <div class="post-img">
                        <span class="over-layer"></span>
                        <img src="http://bestjquery.com/tutorial/news-slider/demo16/images/img-4.jpg" alt="">
                    </div>
                    <h3 class="post-title">
                        <a href="#">Lorem ipsum dolor sit amet, consectetur.</a>
                    </h3>
                    <span class="post-date"><i class="fa fa-calendar"></i> july 17, 2015</span>
                </div>
                
                <div class="post-slide11">
                    <div class="post-img">
                        <span class="over-layer"></span>
                        <img src="http://bestjquery.com/tutorial/news-slider/demo16/images/img-5.jpg" alt="">
                    </div>
                    <h3 class="post-title">
                        <a href="#">Lorem ipsum dolor sit amet, consectetur.</a>
                    </h3>
                    <span class="post-date"><i class="fa fa-calendar"></i> july 17, 2015</span>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="container">
    <h3 class="h3">New slider Demo - 12</h3>
    <div class="row">
        <div class="col-md-12">
            <div id="news-slider12" class="owl-carousel">
                <div class="post-slide12">
                    <div class="post-img">
                        <span class="over-layer"></span>
                        <img src="http://bestjquery.com/tutorial/news-slider/demo15/images/img-1.jpg" alt="">
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <span class="post-date">Nov 10,2015</span>
                        <p class="post-description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at erat, non placerat urna. Pellentesque in convallis risus. Ut dapibus elementum.
                        </p>
                    </div>
                </div>
 
                <div class="post-slide12">
                    <div class="post-img">
                        <span class="over-layer"></span>
                        <img src="http://bestjquery.com/tutorial/news-slider/demo15/images/img-2.jpg" alt="">
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <span class="post-date">Nov 12,2015</span>
                        <p class="post-description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at erat, non placerat urna. Pellentesque in convallis risus. Ut dapibus elementum.
                        </p>
                    </div>
                </div>
 
                <div class="post-slide12">
                    <div class="post-img">
                        <span class="over-layer"></span>
                        <img src="http://bestjquery.com/tutorial/news-slider/demo15/images/img-3.jpg" alt="">
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <span class="post-date">Nov 14,2015</span>
                        <p class="post-description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at erat, non placerat urna. Pellentesque in convallis risus. Ut dapibus elementum.
                        </p>
                    </div>
                </div>
                
                <div class="post-slide12">
                    <div class="post-img">
                        <span class="over-layer"></span>
                        <img src="http://bestjquery.com/tutorial/news-slider/demo15/images/img-4.jpg" alt="">
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                        <span class="post-date">Nov 14,2015</span>
                        <p class="post-description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at erat, non placerat urna. Pellentesque in convallis risus. Ut dapibus elementum.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="container">
    <h3 class="h3">New slider Demo - 13</h3>
    <div class="row">
        <div class="col-md-12">
            <div id="news-slider13" class="owl-carousel">
                <div class="post-slide13">
                    <div class="post-img">
                        <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo3/images/img-1.jpg" alt=""></a>
                    </div>
                    <h5 class="post-title"><a href="#">Aliquam rutrum</a></h5>
                    <ul class="post-bar">
                        <li class="post-date"><i class="fa fa-calendar"></i> june 5, 2015</li>
                        <li class="author"><i class="fa fa-user"></i>   <a href="#">admin</a></li>
                    </ul>
                    <p class="post-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ultrices felis in orci condimentum, at viverra nulla pulvinar. Donec diam nisl.
                    </p>
                </div>
                <div class="post-slide13">
                    <div class="post-img">
                        <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo3/images/img-2.jpg" alt=""></a>
                    </div>
                    <h5 class="post-title"><a href="#">Aliquam rutrum</a></h5>
                    <ul class="post-bar">
                        <li class="post-date"><i class="fa fa-calendar"></i> june 5, 2015</li>
                        <li class="author"><i class="fa fa-user"></i>   <a href="#">admin</a></li>
                    </ul>
                    <p class="post-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ultrices felis in orci condimentum, at viverra nulla pulvinar. Donec diam nisl.
                    </p>
                </div>
                <div class="post-slide13">
                    <div class="post-img">
                        <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo3/images/img-3.jpg" alt=""></a>
                    </div>
                    <h5 class="post-title"><a href="#">Aliquam rutrum</a></h5>
                    <ul class="post-bar">
                        <li class="post-date"><i class="fa fa-calendar"></i> june 5, 2015</li>
                        <li class="author"><i class="fa fa-user"></i>   <a href="#">admin</a></li>
                    </ul>
                    <p class="post-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ultrices felis in orci condimentum, at viverra nulla pulvinar. Donec diam nisl.
                    </p>
                </div>
                <div class="post-slide13">
                    <div class="post-img">
                        <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo3/images/img-4.jpg" alt=""></a>
                    </div>
                    <h5 class="post-title"><a href="#">Aliquam rutrum</a></h5>
                    <ul class="post-bar">
                        <li class="post-date"><i class="fa fa-calendar"></i> june 5, 2015</li>
                        <li class="author"><i class="fa fa-user"></i>   <a href="#">admin</a></li>
                    </ul>
                    <p class="post-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ultrices felis in orci condimentum, at viverra nulla pulvinar. Donec diam nisl.
                    </p>
                </div>
                <div class="post-slide13">
                    <div class="post-img">
                        <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo3/images/img-5.jpg" alt=""></a>
                    </div>
                    <h5 class="post-title"><a href="#">Aliquam rutrum</a></h5>
                    <ul class="post-bar">
                        <li class="post-date"><i class="fa fa-calendar"></i> june 5, 2015</li>
                        <li class="author"><i class="fa fa-user"></i>   <a href="#">admin</a></li>
                    </ul>
                    <p class="post-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ultrices felis in orci condimentum, at viverra nulla pulvinar. Donec diam nisl.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="container">
    <h3 class="h3">New slider Demo - 14</h3>
    <div class="row">
        <div class="col-md-12">
            <div id="news-slider14" class="owl-carousel">
                <div class="post-slide14">
                    <h3 class="post-category"><a href="#">html</a></h3>
                    <div class="post-review">
                        <div class="post-bar">
                            <span class="month">nov</span>
                            <span class="date">5</span>
                        </div>
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                    </div>
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo13/images/img-1.jpg" alt="">
                    </div>
                    <p class="post-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam.
                    </p>
                </div>
 
                <div class="post-slide14">
                    <h3 class="post-category"><a href="#">css</a></h3>
                    <div class="post-review">
                        <div class="post-bar">
                            <span class="month">nov</span>
                            <span class="date">7</span>
                        </div>
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                    </div>
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo13/images/img-2.jpg" alt="">
                    </div>
                    <p class="post-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam.
                    </p>
                </div>
 
                <div class="post-slide14">
                    <h3 class="post-category"><a href="#">php</a></h3>
                    <div class="post-review">
                        <div class="post-bar">
                            <span class="month">nov</span>
                            <span class="date">10</span>
                        </div>
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                    </div>
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo13/images/img-3.jpg" alt="">
                    </div>
                    <p class="post-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam.
                    </p>
                </div>
                
                <div class="post-slide14">
                    <h3 class="post-category"><a href="#">php</a></h3>
                    <div class="post-review">
                        <div class="post-bar">
                            <span class="month">nov</span>
                            <span class="date">10</span>
                        </div>
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                    </div>
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo13/images/img-4.jpg" alt="">
                    </div>
                    <p class="post-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam.
                    </p>
                </div>
                
                <div class="post-slide14">
                    <h3 class="post-category"><a href="#">php</a></h3>
                    <div class="post-review">
                        <div class="post-bar">
                            <span class="month">nov</span>
                            <span class="date">10</span>
                        </div>
                        <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                    </div>
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo13/images/img-5.jpg" alt="">
                    </div>
                    <p class="post-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
    
@else
@endif 

<script>
$(document).ready(function() {
    $("#news-slider").owlCarousel({
        items : 2,
        itemsDesktop : [1199,2],
        itemsMobile : [600,1],
        pagination :true,
        autoPlay : true
    });
    
    $("#news-slider2").owlCarousel({
        items:3,
        itemsDesktop:[1199,2],
        itemsDesktopSmall:[980,2],
        itemsMobile:[600,1],
        pagination:false,
        navigationText:false,
        autoPlay:true
    });
    
    $("#news-slider3").owlCarousel({
        items:3,
        itemsDesktop:[1199,2],
        itemsDesktopSmall:[1000,2],
        itemsMobile:[700,1],
        pagination:false,
        navigationText:false,
        autoPlay:true
    });
    
    $("#news-slider4").owlCarousel({
        items:3,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[1000,2],
        itemsMobile:[600,1],
        pagination:false,
        navigationText:false,
        autoPlay:true
    });
    
    $("#news-slider5").owlCarousel({
        items:3,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[1000,2],
        itemsMobile:[650,1],
        pagination:false,
        navigationText:false,
        autoPlay:true
    });
    
    $("#news-slider6").owlCarousel({
        items : 3,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,2],
        itemsMobile : [600,1],
        pagination:false,
        navigationText:false
    });
    
    $("#news-slider7").owlCarousel({
        items : 3,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [1000,2],
        itemsMobile : [650,1],
        pagination :false,
        autoPlay : true
    });
    
    $("#news-slider8").owlCarousel({
        items : 3,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,2],
        itemsMobile : [600,1],
        autoPlay:true
    });
    
    $("#news-slider9").owlCarousel({
        items : 3,
        itemsDesktop:[1199,2],
        itemsDesktopSmall:[980,2],
        itemsTablet:[650,1],
        pagination:false,
        navigation:true,
        navigationText:["",""]
    });
    
    $("#news-slider10").owlCarousel({
        items : 4,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,2],
        itemsMobile : [600,1],
        navigation:true,
        navigationText:["",""],
        pagination:true,
        autoPlay:true
    });
    
    $("#news-slider11").owlCarousel({
        items : 4,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,2],
        itemsMobile : [600,1],
        pagination:true,
        autoPlay:true
    });
    
    $("#news-slider12").owlCarousel({
        items : 2,
        itemsDesktop:[1199,2],
        itemsDesktopSmall:[980,1],
        itemsTablet: [600,1],
        itemsMobile : [550,1],
        pagination:true,
        autoPlay:true
    });
    
    $("#news-slider13").owlCarousel({
        navigation : false,
        pagination : true,
        items : 3,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,2],
        itemsMobile : [600,1],
        navigationText : ["",""]
    });
    
    $("#news-slider14").owlCarousel({
        items : 4,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,2],
        itemsMobile : [550,1],
        pagination:false,
        autoPlay:true
    });
});




</script>















<!-- Top content -->
