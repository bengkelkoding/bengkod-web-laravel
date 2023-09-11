<x-universal-layout>
    <!-- <img src="http://bengkelkoding.dinus.ac.id/assets/1.jpg" alt="Lobby H6" class="w-[100%] h-auto"> -->
    <div class="relative w-[100%] m-0">
        <div class="hidden slide">
            <img src="http://bengkelkoding.dinus.ac.id/assets/1.jpg" class="w-[100%] h-auto" alt="Lobby H6 1">
        </div>
        <div class="hidden slide">
            <img src="http://bengkelkoding.dinus.ac.id/assets/3.jpg" class="w-[100%] h-auto" alt="Lobby H6 2">
        </div>
        <div class="hidden slide">
            <img src="http://bengkelkoding.dinus.ac.id/assets/2.jpg" class="w-[100%] h-auto" alt="Lobby H6 3">
        </div>
    </div>
    <div class="w-[100%] my-36 flex flex-col justify-center items-center">
        <h1 class="text-5xl">Bengkel Koding</h1>
        <p class="text-center mt-9">
            Merupakan program yang diselenggarakan oleh Program Studi <br>
            Teknik Informatika Universitas Dian Nuswantoro untuk membantu <br>
            mahasiswa memahami pembelajaran dibidang ilmu teknologi.
        </p>
    </div>
    <script>
        let slideIndex = 0;

        function showSlides() {
            const slides = document.querySelectorAll('.slide');
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = 'none';
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1;
            }
            slides[slideIndex - 1].style.display = 'block';
            setTimeout(showSlides, 5000); // Change image every 2 seconds
        }

        showSlides(); 

    </script>
</x-universal-layout>