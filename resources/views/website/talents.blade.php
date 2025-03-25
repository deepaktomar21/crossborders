@extends('Frotent.layout')

@section('title', 'Job List')

@section('content')
    <style>
        .profile-card {
            background-color: #142848;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s;
        }

        .profile-card:hover {
            transform: scale(1.05);
        }

        .profile-image img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .profile-info h2 {
            font-size: 26px;
            margin: 10px 0;
            color: white;
        }

        .profile-info p {
            color: #fff;
            font-size: 16px;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .stat {
            text-align: center;
        }

        .number {
            font-size: 20px;
            font-weight: bold;
            color: #fff;
        }

        .label {
            font-size: 14px;
            color: #ccc;
        }
    </style>

    <!--<div class="intro-section" style="background-image: url('{{ asset('Frotent/images/2.jpg')}}');">-->
    <!--    <div class="container">-->
    <!--        <div class="row align-items-center">-->
    <!--            <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">-->
    <!--                <h1>Find African Talents</h1>-->
                    <!--<h2>Explore career opportunities and grow with us.</h2>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
 <div class="hero-slide owl-carousel site-blocks-cover mt-5">
  <div class="intro-section">
    <img src="{{ asset('Frotent/images/2.jpg') }}" alt="Identify New Talents" class="responsive-image">
    <div class="text-overlay">
      <h1 class="responsive-text">Find African Talents</h1>
    </div>
  </div>
  </div>
<style>
  /* Container to make cards equal height */
  .row {
    display: flex;
    flex-wrap: wrap;
  }
.course-1-item {
  display: flex;
  flex-direction: column;
  height: 100%;
}

.course-1-content {
  flex-grow: 1;
}



  .icon-wrapper.a {
    background-color: #f0c71e;
    padding: 15px;
    border-radius: 50%;
    display: inline-block;
    margin-bottom: 20px;
    transition: transform 0.3s ease;
  }

  .icon-wrapper.a:hover {
    transform: scale(1.1);
  }

  .btn.a:hover {
    background-color: #f0c71e;
    color: #fff;
    transition: all 0.3s ease-in-out;
  }
  .hero-slide {
  position: relative;
}

.intro-section {
  position: relative;
       /*height: 100vh;*/
  overflow: hidden;
}

.responsive-image {
  width: 100%;
  height: auto; /* Maintains aspect ratio */
}

.text-overlay {
  position: absolute;
  top: 50%; /* Center vertically */
  left: 50%; /* Center horizontally */
  transform: translate(-50%, -50%);
  text-align: center;
}

.responsive-text {
  font-size: 4vw; /* Adjust size based on viewport width */
  font-weight: bold;
  color: white;
  text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
  margin: 0;
}

/* Media Queries for Fine-Tuning */
@media (max-width: 1200px) {
  .responsive-text {
    font-size: 5vw;
  }
   .intro-section h1 {
    font-size: 4rem; /* Reducing font size */
  }

  .intro-section,
  .intro-section .container .row {
    min-height: 0; /* Ensuring no minimum height */
  }

  .intro-section {
    height: auto; /* Allow content to define height */
  }

  .owl-carousel .owl-item img {
    margin-top: 88px; /* Creating space above images */
  }
}
.hero-slide .owl-nav .owl-prev, .hero-slide .owl-nav .owl-next {
        top: 58%;
}
}

@media (max-width: 992px) {
  .responsive-text {
    font-size: 6vw;
  }
   .intro-section h1 {
    font-size: 3rem; /* Reducing font size */
  }

  .intro-section,
  .intro-section .container .row {
    min-height: 0; /* Ensuring no minimum height */
  }

  .intro-section {
    height: auto; /* Allow content to define height */
  }

  .owl-carousel .owl-item img {
    margin-top: 88px; /* Creating space above images */
  }
}
.hero-slide .owl-nav .owl-prev, .hero-slide .owl-nav .owl-next {
        top: 58%;
}
}

@media (max-width: 768px) {
  .responsive-text {
    font-size: 7vw;
  }
  .intro-section h1 {
    font-size: 3rem; /* Reducing font size */
  }

  .intro-section,
  .intro-section .container .row {
    min-height: 0; /* Ensuring no minimum height */
  }

  .intro-section {
    height: auto; /* Allow content to define height */
  }

  .owl-carousel .owl-item img {
    margin-top: 88px; /* Creating space above images */
  }
}
.hero-slide .owl-nav .owl-prev, .hero-slide .owl-nav .owl-next {
        top: 58%;
}
}

@media (max-width: 576px) {
  /*.responsive-text {*/
  /*  font-size: 8vw;*/
  /*}*/
  .intro-section h1{
      font-size: 1rem;
  }
  .intro-section, .intro-section .container .row{
          /* height: 100vh; */
     min-height: 0px;
  }
  .intro-section, .intro-section .container .row {
    /* height: 57vh; */
    /*min-height: 0px;*/
}
.owl-carousel .owl-item img {
    margin-top: 88px;
}

.hero-slide .owl-nav .owl-prev, .hero-slide .owl-nav .owl-next {
        top: 58%;
}
}
@media (max-width: 476px) {
  /* Adjusting text size for smaller screens */
  .intro-section h1 {
    font-size: 1rem; /* Reducing font size */
  }

  .intro-section,
  .intro-section .container .row {
    min-height: 0; /* Ensuring no minimum height */
  }

  .intro-section {
    height: auto; /* Allow content to define height */
  }

  .owl-carousel .owl-item img {
    margin-top: 88px; /* Creating space above images */
  }
}
.hero-slide .owl-nav .owl-prev, .hero-slide .owl-nav .owl-next {
        top: 58%;
}
}
       </style>
    <div class="container py-5">
        <!--<h3 class="mb-4">Contact Talent</h3>-->
        <!--<form action="" method="POST">-->
        <!--    @csrf-->
        <!--    <div class="form-group">-->
        <!--        <label for="filter_skills">Filter by Skills</label>-->
        <!--        <input type="text" name="filter_skills" class="form-control" id="filter_skills" placeholder="Enter skills to filter">-->
        <!--    </div>-->

        <!--    <div class="form-group">-->
        <!--        <label for="filter_location">Filter by Location</label>-->
        <!--        <input type="text" name="filter_location" class="form-control" id="filter_location" placeholder="Enter location to filter">-->
        <!--    </div>-->

        <!--    <div class="form-group">-->
        <!--        <label for="availability">Availability</label>-->
        <!--        <select name="availability" class="form-control" id="availability">-->
        <!--            <option value="Available">Available</option>-->
        <!--            <option value="Unavailable">Unavailable</option>-->
        <!--        </select>-->
        <!--    </div>-->

        <!--    <button type="submit" class="btn btn-primary mt-3">Filter Talent</button>-->
        <!--</form>-->

        <!-- Talent Cards -->
        <div class="row mt-5">
            @foreach ($talents as $talent)
                <div class="col-md-4 mb-4">
                    <div class="profile-card fade-in-left" style=" height: 371px; ">
                        <div class="profile-image">
                            @if($talent->image)
                                <img src="{{ asset($talent->image) }}" alt="{{ $talent->name }}">
                            @else
                                <img src="{{ asset('Frotent/images/default-talent-image.jpg') }}" alt="{{ $talent->name }}">
                            @endif
                        </div>
                        <div class="profile-info">
                            <h2>{{ $talent->name }}</h2>
                            <p>Skills: {{ implode(', ', $talent->skills) }}</p>
                            <p><i class="fas fa-map-marker-alt"></i> {{ $talent->current_location }}</p>
                            <p class="card-text">Experience Level: {{ $talent->experience_level }}</p>
                            <!--<p class="card-text">Rate: ${{ $talent->rate ?? 'N/A' }}</p>-->
                             @if(auth()->user())
                            <a href="{{ route('user.talent.show', $talent->id) }}" class="btn a">View Profile</a>
                            @else
                            <a href="{{ route('show', $talent->id) }}" class="btn a">View Profile</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
@endsection
