@extends('layouts.frontend')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" class="my-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">About City</li>
            </ol>
          </nav>
          <div class="container mb-5 mt-5">
            <ul class="nav nav-tabs px-3">
              <li class="nav-item">
                <a class="nav-link {{ 'about-city' == request()->path() ? 'active' : '' }}" aria-current="page" href="{{ url('about-city') }}">About City</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ 'about/how-to-get-there' == request()->path() ? 'active' : '' }}" href="{{ url('/about/how-to-get-there') }}">How Long to Get on Talusan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ 'about/city-mayor' == request()->path() ? 'active' : '' }}" href="{{ url('/about/city-mayor') }}">City Mayor</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ 'about/city-council' == request()->path() ? 'active' : '' }}" href="{{ url('/about/city-council') }}">City Council</a>
              </li>
            </ul>
          </div>


          <div class="row d-flex justify-content-center">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                   History of Talusan
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <p>In realizing our goals and aspirations the municipality will provide environmental protection and uphold effective and strict implementation of laws and ordinances by providing people capacitation, advocating active inter-faith participation and delivering adequate basic services while reinvigorating a firm and strong local governance with demand-driven legislation.</p>
                        <p>Zamboanga Sibugay was formerly part of Zamboanga del Sur which in turn was formerly a territory of the huge Zamboanga Province. On February 24, 2001, the present province was created after the ratification of Republic Act 8973 with then Congressman George Hofer as its first governor. In the election of that year, Belma A. Cabilao was elected as the first congressman of independent Zamboanga Sibugay.
                            The creation of Zamboanga Sibugay as a province had a long history. It started in the 1960s when several bills were filed in the congress such as House Bill No.17574 by the late Rep Vincenzo Sagun, HB No. 8546 of Congresswoman Belma Cabilao, HB No. 341 thru Congressman Vicente M. Cerilles and the Batasan Parliamentary Bill No. sponsored by parliament members (Antonio Ceniza, Manuel M. Espaldon, Hussien Loong, Kalbi Tupay, and Minister Romulo Espaldon). All of these bills were relegated to the recesses of the archives.
                            In 1993, an initiative called the Zamboanga Occidental Movement ushered in a renewed political consciousness among the people of the 3rd district of Zamboanga del Sur. The movement was so intense that a People’s Initiative was conducted simultaneously with the May 1997 Barangay Elections. In this exercise, majority of the voters signed in favor of forming a new province. It was then that Congressman George T. Hofer sponsored HB No. 1311. He managed to push the bill in congress and gave it a new identity by naming the proposed province as Zamboanga Sibugay. He lobbied for its approval in the senate and had former President Joseph E. Estrada finally approve the creation of the new province.
                            The Zamboanga Sibugay Provincial Police office was activated as a type “C” Police Provincial Office effective September 17, 2001 pursuant to General Orders Nr. DPL 01-04 dated September 17, 2001. It was formally organized on October 16, 2001 with PSUPT ARNULFO DEL ROSARIO PEREZ as its first Police Provincial Director.
                            The province of Zamboanga Sibugay was created on November 17, 2000 pursuant to RA 8973 comprising of sixteen (16) municipalities with 389 Barangays. It has a total land area of 3,363.22 square kilometer or 336,332 hectares. The province is divided into 2 provincial districts. Based on the 2006 Census, the total population of the province is 572, 343 inhabitants.
                            </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                     Mission
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                     <p>In realizing our goals and aspirations the municipality will provide environmental protection and uphold effective and strict implementation of laws and ordinances by providing people capacitation, advocating active inter-faith participation and delivering adequate basic services while reinvigorating a firm and strong local governance with demand-driven legislation.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Vision
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <p>A develop, progressive, environmentally-balanced  and peaceful municipality empowered by a God-centered, self-reliant, economically stable, responsive citizenry govern by a transparent, well-equipped, dedicated public servant and upholding quality service and equal justice to the people of Talusan.</p>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>

    </div>
@endsection