@extends('Frotent.layout') {{-- Extend your layout --}}

@section('title', $job->job_title)

@section('content')
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Hero Section -->

<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{ asset('Frotent/images/bg_1.jpg')}}')">
    <div class="container">
      <div class="row align-items-end justify-content-center text-center">
        <div class="col-lg-7">
          <h2 class="mb-0">{{ $job->job_title }}</h2>
          <p>Posted on {{ \Carbon\Carbon::parse($job->created_at)->format('F d, Y') }} by Admin</p>
        </div>
      </div>
    </div>
  </div> 


<div class="custom-breadcrumns border-bottom">
  <div class="container">
    @if(auth()->user())
    <a href="{{route('user.dashboard')}}">Home</a>
    @else
    <a href="{{route('index')}}">Home</a>
    @endif
    <span class="mx-3 icon-keyboard_arrow_right"></span>
    <span class="current">{{ $job->job_title }}</span>
  </div>
</div>

    <!-- Job Details Section -->
    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-primary text-white">
                             @if (session('error'))
                        <p style="color: red;">{{ session('error') }}</p>
                    @endif
                    @if (session('success'))
                        <p style="color: green;">{{ session('success') }}</p>
                    @endif
                            <h3 class="mb-0">{{ $job->job_title }}</h3>
                            <small>Company: {{ $job->company_name }}</small>
                        </div>
                        <div class="card-body p-4">
                            <p class="text-muted"><strong>Job Description:</strong></p>
                            <p class="mb-4">{{ $job->job_description }}</p>

                            <p class="text-muted"><strong>Required Skills:</strong></p>
                            <ul>
                                @foreach(explode(',', $job->required_skills) as $skill)
                                    <li>{{ trim($skill) }}</li>
                                @endforeach
                            </ul>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <p><strong>Location:</strong> {{ $job->location }}</p>
                                    <p><strong>Employment Type:</strong> {{ $job->employment_type }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Experience Level:</strong> {{ $job->experience_level }}</p>
                                    <p><strong>Salary Range:</strong> {{ $job->salary_range }}</p>
                                </div>
                            </div>

                            <p class="mt-3"><strong>Application Deadline:</strong> {{ $job->application_deadline }}</p>

                            <hr class="my-4">
                            
                            <h5>Contact Information</h5>
                            <p><strong>Phone:</strong> {{ $job->contact_number }}</p>
                            <p><strong>Email:</strong> <a href="mailto:{{ $job->hr_mail_id }}">{{ $job->hr_mail_id }}</a></p>

                            <hr class="my-4">
                            
                            <p class="text-muted"><strong>Additional Message:</strong></p>
                            <p>{{ $job->message }}</p>
                            <div class="text-center mt-4">
                                <!--<a href="#" class="btn btn-success btn-lg px-5">Apply Now</a>-->
                                   @if(auth()->user())
                          <button class="btn btn-success btn-lg px-5" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</button>
                          @else
                          <a class="btn btn-success btn-lg px-5" href="{{route('user.login')}}">Apply Now</a>
                          @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applyModalLabel">Apply for {{ $job->job_title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.JobApplicationuser') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your first name" required>
                            @if(auth()->user())
                                <input type="text" class="form-control" id="user_id" value="{{ auth()->user()->id }}" name="user_id" hidden>
                            @else
                                <input type="text" class="form-control" id="user_id" value="" name="user_id" hidden>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your last name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email ID</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="contact_number" class="form-label">Contact Number</label>
                            <input type="number" class="form-control" id="contact_number" name="contact_number" placeholder="Enter your contact number" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="location" class="form-label">Location</label>
                            <select class="form-control" id="location" name="location" required>
                                <option value="{{ $job->location }}">{{ $job->location }}</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address" required></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="experience_level" class="form-label">Experience Level</label>
                            <input type="text" class="form-control" id="experience_level" value="{{ $job->experience_level }}" name="experience_level" placeholder="Enter your experience level" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="post" class="form-label">Which Post You Apply</label>
                            <input type="text" class="form-control" id="post" placeholder="Enter the post you are applying for" name="post" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="current_ctc" class="form-label">Current CTC</label>
                            <input type="number" class="form-control" id="current_ctc" name="current_ctc" placeholder="Enter your current CTC" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="expected_ctc" class="form-label">Expected CTC</label>
                            <input type="number" class="form-control" id="expected_ctc" name="expected_ctc" placeholder="Enter your expected CTC" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="employment_type" class="form-label">Employment Type</label>
                            <select class="form-control" id="employment_type" name="employment_type" required>
                                <option value="{{ $job->employment_type }}">{{ $job->employment_type }}</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="resume" class="form-label">Upload Resume</label>
                            <input type="file" class="form-control" id="resume" name="resume" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="cover_letter" class="form-label">Upload Cover Letter (Optional)</label>
                            <input type="file" class="form-control" id="cover_letter" name="cover_letter" placeholder="Upload your cover letter">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit Application</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // Wait for the DOM to load
    document.addEventListener('DOMContentLoaded', function () {
        // Set a timeout to hide the error message after 10 seconds
        setTimeout(function () {
            let errorMessage = document.getElementById('error-message');
            let successMessage = document.getElementById('success-message');
            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 10000); // 10000 milliseconds = 10 seconds
    });
</script>
@endsection
