@extends('layouts.app')

@section('content')
    <body class="leading-normal tracking-normal text-white gradient vsc-initialized">

        <div class="pt-14">
        <!--only here to make space-->
        </div>

        <div class="-mt-12 lg:-mt-24">
            <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-2.000000, 44.000000)" fill="#f5f5f4" fill-rule="nonzero">
                        <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                        <path d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z" opacity="0.100000001"></path>
                        <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
                    </g>
                    <g transform="translate(-4.000000, 76.000000)" fill="#f5f5f4" fill-rule="nonzero">
                        <path d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"></path>
                    </g>
                </g>
            </svg>
        </div>
        <!-- Content -->
        <section class="text-gray-900 body-font bg-stone-100">
            <div class="container mx-auto flex px-5 pb-8 md:flex-row flex-col items-center">
                <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                    <blockquote class="blockquote">
                        <p>Shaken, not stirred.</p>
                        <span>James bond</span>
                    </blockquote>
                    <p class="pl-10 pr-32 leading-relaxed font-normal text-gray-900">
                        Looking for a drink to get you through the day? Look no further! Aperita is here to help you find the perfect drink for you, 
                        from the classics to the new and exciting. We have it all. You can search for a drink by name, or by ingredient. 
                        You can select ingredients that you have at home and we will show you what drinks you can make with them. 
                        We also have a random drink generator, so if you are feeling adventurous, you can let us choose for you!
                        Have a nice drink!
                    </p>
                </div>
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                    <img class="object-cover object-center scale-75" alt="hero" src="img/hero_cocktail.svg">
                </div>
            </div>
        </section>

        <div class="bg-stone-100">
            <div class="bar bg-stone-400"></div>
        </div>

        <section class="text-gray-900 body-font bg-stone-100 pb-5">
            <div class="container px-5 pt-24 mx-auto">
                <div class="text-center">
                    <h1 class="sm:text-6xl text-4xl font-medium text-gray-900 mb-4" style="font-family: 'Great Vibes', cursive;">Let's get started !</h1>
                    <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">
                        Enter the name of a cocktail, a letter or selected the ingredients you have at 
                        home and we will show you what you can make! Or if you are not in the mood, 
                        just click the random button and we will provide you a random cocktail!
                    </p>
                    <div class="flex mt-6 justify-center">
                        <div class="w-32 h-[3px] rounded-full bg-blue-800 inline-flex"></div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap mx-12 mt-8">
                @foreach ($cocktails as $cocktail)
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <div class="h-full flex items-center bg-stone-200 border-gray-300 border p-4 rounded-lg">
                        <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="img/list_cocktail.svg">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 font-semibold">{{ $cocktail['name'] }}</h2>
                            <p class="text-gray-500 italic">{{ isset($cocktail['category']) ? $cocktail['category'] : 'No category' }}</p>
                        </div>
                        <a href="#">
                            <svg width="15px" height="15px" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="p-2 w-16 h-16 object-cover object-center flex-shrink-0 bg-stone-300
                                        border border-gray-400 hover:ring hover:ring-opacity-40 hover:ring-blue-800 rounded-lg 
                                        duration-300 ease-in-out float-right hover:text-blue-800">
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M4.5 1C4.22386 1 4 1.22386 4 1.5C4 1.77614 4.22386 2 4.5 2H12V13H4.5C4.22386 13 4 13.2239 4 13.5C4 13.7761 4.22386 14 4.5 14H12C12.5523 14 13 13.5523 13 13V2C13 1.44772 12.5523 1 12 1H4.5ZM6.60355 4.89645C6.40829 4.70118 6.09171 4.70118 5.89645 4.89645C5.70118 5.09171 5.70118 5.40829 5.89645 5.60355L7.29289 7H0.5C0.223858 7 0 7.22386 0 7.5C0 7.77614 0.223858 8 0.5 8H7.29289L5.89645 9.39645C5.70118 9.59171 5.70118 9.90829 5.89645 10.1036C6.09171 10.2988 6.40829 10.2988 6.60355 10.1036L8.85355 7.85355C9.04882 7.65829 9.04882 7.34171 8.85355 7.14645L6.60355 4.89645Z"
                                    fill="currentColor"/>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- End content -->
        <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
                    <g class="wave" fill="#f5f5f4">
                        <path d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"></path>
                    </g>
                    <g transform="translate(1.000000, 15.000000)" fill="#f5f5f4">
                        <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                            <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                            <path d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z" opacity="0.100000001"></path>
                            <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" opacity="0.200000003"></path>
                        </g>
                    </g>
                </g>
            </g>
        </svg>

        <!-- <script>
            var name = 'bloody mary'
            $.ajax({
                method: 'GET',
                url: 'https://api.api-ninjas.com/v1/cocktail?name=' + name,
                headers: { 'X-Api-Key': '226S4O8bs3Me60uuGe0m+A==uD37mNN5wkuUqmms'},
                contentType: 'application/json',
                success: function(result) {
                    console.log(result);
                },
                error: function ajaxError(jqXHR) {
                    console.error('Error: ', jqXHR.responseText);
                }
            });
        </script> -->

    </body>
@endsection