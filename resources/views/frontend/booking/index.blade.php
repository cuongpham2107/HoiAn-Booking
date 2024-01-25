@extends('frontend.layouts.default')
@section('content')
    <div class="page-wrapper" x-data='booking'>

        <!-- Page Banner -->
        <section class="page-banner style-two" style="background-image: url({{ Voyager::image($bookingBanners[0]->image) }})">
            <div class="auto-container">
                <ul class="page-breadbrumbs">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Booking</li>
                </ul>
                <h1 class="page-banner_title">Booking</h1>
            </div>
        </section>
        <!-- End Page Banner -->
        <section class="tour-detail-two">
            <div class="auto-container">
              <form action="{{ route('booking') }}" method="post">
                @csrf
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="position-sticky">
                                <!-- Price Summary  -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Price Summary</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul>
                                            <li class="d-flex align-items-center justify-content-between mb-2">
                                                <span>Hotel</span> <span x-text='"$ "+getTotalHotel()'></span></li>
                                            <li class="d-flex align-items-center justify-content-between mb-2"><span>Tour
                                                </span> <span x-text='"$ "+getTotalTour()'></span></li>
                                        </ul>
                                    </div>
                                    <div class="card-footer bg-transparent">
                                        <h5 class="d-flex align-items-center justify-content-between"><span>Total
                                                Payable</span> <span x-text='"$ "+getTotalPay()'></span></h5>
                                    </div>
                                </div>

                                <!-- Cancellation Ploicy  -->
                                <div class="card mt-4">
                                    <div class="card-header">
                                        <h5>Cancellation Ploicy</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul>
                                            <li class="mb-3"><span class="fa fa-solid fa-chevron-right me-2"></span> If
                                                you cancel your booking before 72 hour from check-in time you will get 30%
                                                refund</li>
                                            <li class="mb-3"><span class="fa fa-solid fa-chevron-right me-2"></span> If
                                                you cancel your booking before 48 hour from check-in time you will get 10%
                                                refund</li>
                                            <li class="mb-3"><span class="fa fa-solid fa-chevron-right me-2"></span> If
                                                you cancel your booking before 24 hour you will not get refund</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <!-- Room Details -->
                                <div class="card" style="border: 1px solid gray">
                                    <div class="card-header">
                                        <h5>Hotel Booking </h5>
                                        <span x-text="mes_hotel"></span>
                                    </div>
                                    <template x-for="(h, i) in hotel" :key='i'>
                                        <div class="card-body" style="border-top: 1px solid gray;">
                                            <div class="d-flex align-items-center gap-4 flex-wrap flex-lg-nowrap">
                                                <div class="room-decoration flex-shrink-0">
                                                    <a :href="h.url" class="lightbox-image">
                                                        <img :src="h.thumbnails"
                                                            style="width: 310px; height: 170px; object-fit: cover"
                                                            alt=""></a>
                                                </div>
                                                <div class="room-content">
                                                    <h5><a href=":href="h.url"" x-text='h.name + " ( " + h.name_hotel +" ) "'></a></h5>
                                                    <div class="room-info mt-2">
                                                        <p class="mb-2"><i class="fas fa-map-marker-alt fa-fw"></i> <span
                                                                x-text='h.address'></span></p>
                                                        <div class="room-rating" x-html="star(h.rating)">

                                                        </div>
                                                        <ul class="room-facilities flex-wrap flex-xl-nowrap">
                                                            <li x-text='getPriceHotel(i)'></li>
                                                            <li x-text='"Room size: " +h.room_size'></li>
                                                            <li x-text='"Capacity: " +h.capacity'></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="booking-table w-100"
                                                style="margin-top: 20px; border: 1px solid rgba(var(--black-color-rgb), 0.1);">
                                                <thead>
                                                    <tr>
                                                        <th>Check in</th>
                                                        <th>Check out</th>
                                                        <th>Rooms</th>
                                                        <th>Person</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="booking-row-title">
                                                                <input type="datetime-local" class="form-control"
                                                                    x-model="h.check_in" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="booking-row-title">
                                                                <input type="datetime-local" class="form-control"
                                                                    x-model="h.check_out" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="booking-row-title">
                                                                <input type="number" class="form-control" x-model="h.rooms"
                                                                    min="1" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="booking-row-title">
                                                                <input type="number" class="form-control"
                                                                    x-model="h.person" min="1" required>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </template>

                                </div>

                                <!-- Tour Detail -->
                                <div class="card mt-4" style="border: 1px solid gray">
                                    <div class="card-header">
                                        <h5>Tour Booking </h5>
                                        <span x-text="mes_tour"></span>
                                    </div>
                                    <template x-for="(t, i) in tour" :key="i">
                                        <div class="card-body " style="border-top: 1px solid gray;">
                                            <div class="d-flex align-items-center gap-4 flex-wrap flex-lg-nowrap">
                                                <div class="room-decoration flex-shrink-0">
                                                    <a :href="t.url" class="lightbox-image">
                                                        <img :src="t.thumbnails" alt=""
                                                            style="width: 310px;height: 170px; object-fit: cover"></a>
                                                </div>
                                                <div class="room-content">
                                                    <h5><a :href="t.url" x-text='t.name'></a></h5>
                                                    <div class="room-info mt-2">

                                                        <ul class="room-facilities flex-wrap flex-xl-nowrap"
                                                            style="list-style: none;">

                                                            <li>
                                                                <p class="mb-2">
                                                                    <span x-text='getPriceTour(i)'></span>
                                                                </p>
                                                            </li>
                                                            <li>
                                                                <p class="mb-2"><i
                                                                        class="fas fa-map-marker-alt fa-fw"></i> To: <span
                                                                        x-text='t.destination'></span></p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="booking-table w-100"
                                                style="margin-top: 20px; border: 1px solid rgba(var(--black-color-rgb), 0.1);">
                                                <thead>
                                                    <tr>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Person</th>
                                                        <th>Children</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="booking-row-title">
                                                                <input type="datetime-local" class="form-control"
                                                                    x-model="t.start_date" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="booking-row-title">
                                                                <input type="datetime-local" class="form-control"
                                                                    x-model="t.end_date" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="booking-row-title">
                                                                <input type="number" class="form-control"
                                                                    x-model="t.person" required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="booking-row-title">
                                                                <input type="number" class="form-control"
                                                                    x-model="t.children" required>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </template>
                                    <input type="hidden" name="tours" :value="JSON.stringify(tour)">
                                    <input type="hidden" name="hotels" :value="JSON.stringify(hotel)">
                                </div>

                                <!-- Guest Information -->
                                <div class="card mt-4" style="border: 1px solid gray">
                                    <div class="card-header">
                                        <h5>Guest Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <!-- Booking Form -->
                                        <div class="booking-form">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="form-label">Title</label>
                                                        <select
                                                            class="custom-select-box select-default px-3 select2-hidden-accessible"
                                                            data-select2-id="select2-data-1-ougt" tabindex="-1"
                                                            aria-hidden="true" name="title">
                                                            <option data-select2-id="select2-data-3-c8cu">Mrs</option>
                                                            <option>Mr</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-5">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="form-label">First Name</label>
                                                        <input type="text" name="first_name" placeholder="First Name"
                                                            required="">
                                                    </div>
                                                </div>

                                                <div class="col-lg-5">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="form-label">Last Name</label>
                                                        <input type="text" name="last_name" placeholder="Last Name"
                                                            required="">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group mb-0">
                                                        <label class="form-label">Email Address</label>
                                                        <input type="email" name="email" placeholder="Email Address"
                                                            required="">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group mb-0">
                                                        <label class="form-label">Phone Number</label>
                                                        <input type="number" name="phone" placeholder="Phone Number"
                                                            required="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" style="margin: 10px;font-weight: 600;" type="submit"
                                        x-bind:disabled="getTotalPay == 0">
                                        Booking
                                    </button>
                                    

                                </div>
                            </div>
                       
                    </div>
                </form>
            </div>
        </section>
    </div>
    <!-- End PageWrapper -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('booking', () => ({
                tour: [],
                hotel: [],
                totalT: 0,
                totalH: 0,
                total: 0,
                mes_tour:'',
                mes_hotel:'',
                init() {
                    let success = JSON.parse(`@json(session()->get('success'))`)
                    if (success) this.deleteStorage()
                    fetch('{{ route('booking.tour') }}?tour=' + localStorage.getItem('tour'), {
                            method: 'GET',
                        })
                        .then(response => response.json())
                        .then(data => {

                            if (data.message === 'success') {
                                this.tour = data.results
                                this.tour.forEach((t) => {
                                    t.start_date = new Date().toISOString().slice(0, 16);
                                    t.end_date = new Date().toISOString().slice(0, 16);
                                })
                            }
                            if(data.message === 'error'){
                                this.mes_tour = "( No tours have been added to Booking yet! )"
                            }
                            // console.log(this.tour)
                        })
                        .catch(error => {
                            console.error('Lỗi khi tải lên:', error);
                        });
                    fetch('{{ route('booking.hotel') }}?hotel=' + localStorage.getItem('hotel'), {
                            method: 'GET',
                        })
                        .then(response => response.json())
                        .then(data => {

                            if (data.message === 'success') {
                                this.hotel = data.results
                                this.hotel.forEach((t) => {
                                    t.check_in = new Date().toISOString().slice(0, 16);
                                    t.check_out = new Date().toISOString().slice(0, 16);
                                })
                            }
                            if(data.message === 'error'){
                                this.mes_hotel = "( No hotels have been added to Booking yet! )"
                            }
                        })
                        .catch(error => {
                            console.error('Lỗi khi tải lên:', error);
                        });

                },
                deleteStorage() {
                    localStorage.clear();
                },
                star(rating) {

                    let a = '<span class="fa fa-star"></span>'
                    for (let i = 1; i < rating; i++) {
                        a += '<span class="fa fa-star"></span>'
                    }
                    // console.log(a)
                    return a;
                },
                getIdTours() {
                    var tourIds = this.tour.map(function(t) {
                        return t.id;
                    });
                    return tourIds;
                },
                getPriceTour(index) {
                    // console.log(this.tour[index])
                    let price = 0;
                    let person = this.tour[index].person
                    let children = this.tour[index].children
                    if (person > 0) {

                        switch (person) {
                            case '1':
                                price = this.tour[index].price_per_1
                                break;
                            case '2':
                                price = this.tour[index].price_per_2
                                break;
                            case '3':
                                price = this.tour[index].price_per_3
                                break;
                            case '4':
                                price = this.tour[index].price_per_4
                                break;
                            case '5':
                                price = this.tour[index].price_per_5
                                break;
                            case '6':
                                price = this.tour[index].price_per_6
                                break;
                            case '7':
                                price = this.tour[index].price_per_7
                                break;
                            default:
                                price = this.tour[index].price_per_8
                                break;
                        }

                        let childrenDiscount = 0
                        if (children > 0) {
                            childrenDiscount = price / 100 * this.tour[index].children_discount
                        }
                        this.tour[index].price = price
                        return `Price: $ ${price * person + childrenDiscount * children}`
                    } else {
                        return `Price: $ ${this.tour[index].price_per_8}  - $  ${this.tour[index].price_per_1}`
                    }
                },
                getPriceHotel(index) {
                    let _from = new Date(this.hotel[index].check_in),
                        _to = new Date(this.hotel[index].check_out),
                        day = 0
                    if(_to >= _from){
                        let diff = _to - _from;
                        day = diff / (24 * 60 * 60 * 1000)
                    }
                    let rooms = this.hotel[index].rooms;
                    if (rooms > 0 && day > 0) {
                        return `Price: $  ${this.hotel[index].price * rooms * day}`
                    } else {
                        return `Price: $  ${this.hotel[index].price}`
                    }
                },
                getTotalHotel() {
                    let totalHotel = 0
                    this.hotel.forEach((h) => {
                        let _from = new Date(h.check_in),
                            _to = new Date(h.check_out),
                            day = 0
                        if(_to >= _from){
                            let diff = _to - _from;
                            day = diff / (24 * 60 * 60 * 1000)
                        }
                        if(day > 0){
                            totalHotel += h.price * h.rooms * day
                        }else{
                            totalHotel += h.price * h.rooms
                        }
                       
                    })
                    this.totalH = totalHotel
                    return totalHotel
                },
                getTotalTour() {
                    let totalTour = 0
                    let children_disc_price = 0
                    let person_price = 0
                    this.tour.forEach((t) => {
                        children_disc_price = (t.price / 100 * t.children_discount) * parseInt(t
                            .children)
                        person_price = t.price * parseInt(t.person)
                        totalTour += (person_price + children_disc_price)
                    })
                    this.totalT = totalTour
                    return totalTour
                },
                getTotalPay() {
                    return this.totalH + this.totalT
                }
            }))
        })
    </script>
@endsection
