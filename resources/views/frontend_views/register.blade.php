@extends('frontend_views.layouts.master')
@section('content')

<main>
    <section class="page-header bg-light py-5">
      <div class="container">
        <div class="row">
          <div class="col">
            <ol class="list-unstyled d-flex">
              <li><a href="https://bakkah.com">Home</a></li>
              <li class="mx-4">Register on Course Name</li>
            </ol>
            <h1>Register on Course Name</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="courses py-5">
      <div class="container">
        <h3 class="text-center mb-5">
          Register on <span class="text-info">Course Name</span> with Price
          <span class="text-danger">450$</span>
        </h3>

        <div class="row">
          <div class="col-md-8">
            <form action="" method="post">
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-group">
                    <input
                      type="text"
                      name="name"
                      value=""
                      placeholder="Your Name *"
                      class="form-control"
                    />
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-group">
                    <input
                      type="email"
                      name="email"
                      value=""
                      placeholder="Your Email *"
                      class="form-control"
                    />
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-group">
                    <input
                      type="tel"
                      name="mobile"
                      value=""
                      placeholder="Your Mobile "
                      class="form-control"
                    />
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-group">
                    <input
                      type="text"
                      name="name"
                      value=""
                      placeholder="Subject"
                      class="form-control"
                    />
                  </div>
                </div>
              </div>
              <p style="padding-top: 15px">
                <button class="btn btn-dark btn-lg px-5">
                  Register & Pay Online
                </button>
              </p>
            </form>
          </div>
          <div class="col-md-4">
            <div class="card mb-5 mb-md-0">
              <div class="card-header bg-dark text-white">
                <h5 class="m-0">Order Summary</h5>
              </div>
              <div class="card-body py-2">
                <ul id="orderSummaryList" class="list-unstyled summary">
                  <li>
                    <div class="d-flex justify-content-between">
                      <h5>Course Price</h5>
                      <h5>450$</h5>
                    </div>
                  </li>
                </ul>
                <hr>
                <div class="d-flex justify-content-between">
                  <h4 class="text-danger">Total</h4>
                  <h4 class="text-danger">450$</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

@stop
