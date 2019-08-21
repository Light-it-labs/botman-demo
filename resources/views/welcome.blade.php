<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BotMan Studio</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        body {
            font-family: "Varela Round", sans-serif;
            margin: 0;
            padding: 0;
            background: #13998c;
        }

        .container {
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
        }

        .content {
            text-align: center;
        }

        .logo {
            margin-right: 40px;
            margin-bottom: 20px;
        }

        .links a {
            font-size: 1.25rem;
            text-decoration: none;
            color: white;
            margin: 10px;
        }

        @media all and (max-width: 500px) {

            .links {
                display: flex;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="logo">
            <svg id="Light-it logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 123.04 50"><defs><style>.cls-1{fill:#fff;}.cls-2{fill:#fff;}.cls-3{fill:#fff;}</style></defs><title>Mesa de trabajo 1</title><g id="logo"><polygon id="path46" class="cls-1" points="27.68 13.83 31.55 13.83 31.55 17.23 27.68 17.23 27.68 13.83"></polygon><polygon id="path52" class="cls-1" points="31.47 37.59 31.47 18.05 27.59 18.05 27.59 37.59 16.49 37.59 16.49 12.41 20.29 12.41 20.29 9 13.04 9 13.04 41 31.48 41 31.48 37.59 31.47 37.59"></polygon><polygon id="path48" class="cls-2" points="38.15 27.95 32.07 27.95 32.07 31.97 38.15 31.97 38.15 27.95"></polygon><polygon id="path56" class="cls-2" points="21.03 9 21.03 9 21 9 21 32.03 26.96 32.03 26.96 28.02 25.4 28.02 25.4 12.41 42.03 12.41 42.03 37.59 32.22 37.59 32.22 41 45.48 41 45.48 9 21.03 9"></polygon></g><g id="ligth-it"><path class="cls-3" d="M59.26,28.74h4.18v1.1h-5.5V20.16h1.32Z"></path><path class="cls-3" d="M66.44,29.84H65.13V20.16h1.31Z"></path><path class="cls-3" d="M73.35,28.89a5.39,5.39,0,0,0,.72,0,5.3,5.3,0,0,0,.62-.11,4.43,4.43,0,0,0,.55-.18q.26-.11.51-.24V26.18h-1.5a.27.27,0,0,1-.2-.07.22.22,0,0,1-.08-.18v-.74h3V28.9a5,5,0,0,1-.76.46,5.24,5.24,0,0,1-.84.33,6.67,6.67,0,0,1-1,.19,7.68,7.68,0,0,1-1.11.07,5,5,0,0,1-1.93-.36,4.42,4.42,0,0,1-1.52-1,4.62,4.62,0,0,1-1-1.56,6,6,0,0,1,0-4,4.34,4.34,0,0,1,2.55-2.57,5.55,5.55,0,0,1,2-.36,6,6,0,0,1,1.07.09,4.18,4.18,0,0,1,.91.24,3.76,3.76,0,0,1,.78.38,5.89,5.89,0,0,1,.67.51l-.37.6a.34.34,0,0,1-.3.18A.43.43,0,0,1,76,22l-.38-.23a3,3,0,0,0-.51-.26,3.73,3.73,0,0,0-.71-.22,5.42,5.42,0,0,0-1-.08,4.1,4.1,0,0,0-1.48.26,3.2,3.2,0,0,0-1.13.77,3.27,3.27,0,0,0-.71,1.2,5.21,5.21,0,0,0,0,3.22,3.31,3.31,0,0,0,.73,1.22,3.18,3.18,0,0,0,1.12.76A3.68,3.68,0,0,0,73.35,28.89Z"></path><path class="cls-3" d="M86.8,29.84H85.48v-4.4H80.27v4.4H79V20.16h1.32v4.32h5.21V20.16H86.8Z"></path><path class="cls-3" d="M95.76,20.16v1.1H92.63v8.58H91.32V21.26H88.18v-1.1Z"></path><path class="cls-3" d="M95.42,25.28h3.34v1H95.42Z"></path><path class="cls-3" d="M102.16,29.84h-1.31V20.16h1.31Z"></path><path class="cls-3" d="M111.35,20.16v1.1h-3.13v8.58h-1.31V21.26h-3.14v-1.1Z"></path></g></svg>
        </div>

        <div class="links">
            <a href="http://bit.ly/2QjCAFx">Web</a>
            <a href="https://twitter.com/lightit_soft" target="_blank">Twitter</a>
            <a href="https://medium.com/light-it" target="_blank">Blog</a>
            <a href="https://www.instagram.com/lightitsoftware/" target="_blank">Instagram</a>
            <a href="https://github.com/Light-it-labs/botman-demo" target="_blank">Github</a>
        </div>
    </div>
</div>
<script>
    var botmanWidget = {
        frameEndpoint: '/chatbot',
        aboutText: 'Powered by Light-it',
        title: 'Botman demo',
        introMessage: 'Hi, welcome to Light-it Botman! <br> Type your selected option: <br> 1. Apply for a job <br> 2. FAQ',
        placeholderText: 'Type your message here...',
        mainColor: '#f38017',
        bubbleBackground: '#f38017',
        aboutLink: 'https://lightit.io'
    };
</script>

<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
<!--Start of Tawk.to Script-->
{{--<script type="text/javascript">--}}
{{--var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();--}}
{{--(function(){--}}
{{--var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];--}}
{{--s1.async=true;--}}
{{--s1.src='https://embed.tawk.to/5c90dd1fc37db86fcfceb353/default';--}}
{{--s1.charset='UTF-8';--}}
{{--s1.setAttribute('crossorigin','*');--}}
{{--s0.parentNode.insertBefore(s1,s0);--}}
{{--})();--}}
{{--</script>--}}
<!--End of Tawk.to Script-->
{{--<script>var BotStar={appId:"s2c4a881e-9aa3-491b-a2d3-42b0230c5a82"};!function(){var t=document.createElement("script");t.src="https://widget.botstar.com/static/js/widget.js",t.type="text/javascript",t.async=!0;var e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e)}();</script>--}}
</body>
</html>