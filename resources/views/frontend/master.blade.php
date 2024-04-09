<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rags</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ asset('frontend/font.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/index.css') }}">

</head>
<body>
    <div class="min-[700px]:w-[85%] full-content max-[699px]:p-8 lato-regular">
        {{-- header --}}
        @include('frontend.body.header')
        <div class="flex flex-row mt-2">
            {{-- sidebar --}}
            @include('frontend.body.sidebar')
            <div class="min-[699px]:basis-4/5  ">

                <!-- carousel starts -->
                @yield('content')
                <!-- category ends -->




            </div>

        </div>
        <!-- Get In Touch section -->
        @yield('contact')

        <!-- get in touch ends -->

        <!-- Footer starts -->

        @include('frontend.body.footer')
        <!-- Footer ends -->

    </div>

    <script>


        function accordion(){
            let listElements = document.querySelectorAll('.link');

            listElements.forEach(listElement => {
                listElement.addEventListener('click', ()=>{
                    if (listElement.classList.contains('active')){
                        listElement.classList.remove('active');
                    }else{
                        listElements.forEach (listE => {
                            listE.classList.remove('active');
                        })
                        listElement.classList.toggle('active');
                    }
                })
            });
        }
        accordion();

        // slider starts


        // var slideIndex = 1;
        // showSlides(slideIndex);

        // function plusSlides(n){
        //     showSlides(slideIndex += n);
        // }
        // function showSlides(n){
        //     var i;
        //     var slides = document.getElementsByClassName("mySlides");

        //     if(n > slides.length){slideIndex = 1;}
        //     if(n < 1){slideIndex = slides.length;}
        //     for(i = 0; i<slides.length; i++){
        //         slides[i].style.display = "none";
        //     }
        //     slides[slideIndex - 1].style.display = "block";
        // }
        let SlideInd = 0;

        function showSlidesAuto(){
            let i;
            let slides = document.getElementsByClassName("mySlides");
            for(i = 0; i<slides.length;i++){
                slides[i].style.display = "none";
            }
            SlideInd++;
            if(SlideInd>slides.length){
                SlideInd = 1;
            }
            slides[SlideInd - 1].style.display = "block";

        }
        showSlidesAuto();
        setInterval(showSlidesAuto,3000);
        // slider ends

    </script>
</body>
</html>
