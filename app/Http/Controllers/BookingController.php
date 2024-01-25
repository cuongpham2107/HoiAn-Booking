<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index() {
        $bookingBanners = \App\Banner::where('status','ACTIVE')->where('type','BOOKING BANNER')->get();
        return view('frontend.booking.index')->with(compact('bookingBanners'));
    }
    public function listTourBooking(Request $request){
        $tuor_id = json_decode($request->input('tour') ?? '' ,true); 
        if($tuor_id){
            $tours = \App\Tour::with('book_tour')
            ->whereIn('id', $tuor_id)
            ->get();
            $listTour = [];
        
            foreach($tours as $tour){
                $data = [
                    'id'                => $tour->id,
                    'name'              => $tour->name,
                    'thumbnails'        =>  url('/')."/public/storage/".$tour->thumbnails,
                    'url'               => url('/')."/tours/".$tour->slug,
                    'type_of_tourism'   => $tour->type_of_tourism,
                    'destination'       => $tour->destination,
                    'price_per_1'       => $tour->price_per_1,
                    'price_per_2'       => $tour->price_per_2,
                    'price_per_3'       => $tour->price_per_3,
                    'price_per_4'       => $tour->price_per_4,
                    'price_per_5'       => $tour->price_per_5,
                    'price_per_6'       => $tour->price_per_6,
                    'price_per_7'       => $tour->price_per_7,
                    'price_per_8'       => $tour->price_per_8,
                    'children_discount' => $tour->children_discount,
                    'departure_point'   => $tour->book_tour->departure_point ?? '',
                    'price'             => $tour->book_tour->price ?? '',
                    'person'            => 0,
                    'children'          => 0,
                    'start_date'        => '',
                    'end_date'          => '',
                ];
                array_push($listTour, $data);
            }
            return response()->json([
                'results' => $listTour,
                'message' => 'success'
            ]);
        }
        return response()->json([
            'results' => [],
            'message' => 'error'
        ]);
        
    }
    public function listHotelBooking(Request $request){
        $room_type_id = json_decode($request->input('hotel') ?? '' ,true); 
        if($room_type_id){
            $hotels = \App\RoomType::with('hotel')->whereIn('id', $room_type_id)->get();
            $listHotel = [];
           
            foreach($hotels as $hotel){
                $data = [
                    'id'                => $hotel->id,
                    'name_hotel'        => $hotel->hotel->name,
                    'name'              => $hotel->name,
                    'thumbnails'        =>  url('/')."/public/storage/".json_decode($hotel->image)[0],
                    'url'               =>  url('/')."/hotels/".$hotel->hotel->slug,
                    'address'           => $hotel->hotel->address,
                    'price'             => $hotel->price,
                    'rating'            => $hotel->hotel->rating,
                    'room_size'         => $hotel->room_size,
                    'capacity'          => $hotel->capacity,
                    'check_in'          => '',
                    'check_out'         => '',
                    'rooms'             => 1,
                    'person'            => 1
                ];
                array_push($listHotel, $data);
            }
            // dd($hotels);
            return response()->json([
                'results' => $listHotel,
                'message' => 'success'
            ]);
        }
        return response()->json([
            'results' => [],
            'message' => 'error'
        ]);
       
    }
    public function booking(Request $request) {
        // dd($request->all(), json_decode($request->tours)[0]);
        $validated = $request->validate([
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric|min:10'
        ]);
        try {
            $alert = [
              "type" => "success",
              "title" => __("Thành công"),
              "body" => __("Cảm ơn bạn đã booking, chúng tôi sẽ sớm phản hồi cho bạn!")
            ];
      
            $booking= new \App\Booking();
            $booking->title         = $request->title;
            $booking->first_name    = $request->first_name;
            $booking->last_name     = $request->last_name;
            $booking->email         = $request->email;
            $booking->phone         = $request->phone;
            $booking->save();
            $tours = json_decode($request->tours);
            $hotels = json_decode($request->hotels);
            foreach ($tours as $key => $tour) {
                $booking_tour_item = new \App\BookingTourItem();
                $booking_tour_item->tour_id                     = $tour->id;
                $booking_tour_item->booking_id                  = $booking->id;
                $booking_tour_item->start_date                  = $tour->start_date;
                $booking_tour_item->end_date                    = $tour->end_date;
                $booking_tour_item->children                    = $tour->children;
                $booking_tour_item->person                      = $tour->person;
                $booking_tour_item->price_person_ticket         = $tour->price;
                $booking_tour_item->discount_children_ticket    = $tour->children_discount;
                $booking_tour_item->save();

            }
            foreach ($hotels as $key => $hotel) {
                $booking_hotel_item = new \App\BookingHotelItem();
                $booking_hotel_item->hotel_id       = $hotel->id;
                $booking_hotel_item->booking_id     = $booking->id;
                $booking_hotel_item->check_in       = $hotel->check_in;
                $booking_hotel_item->check_out      = $hotel->check_out;
                $booking_hotel_item->rooms          = $hotel->rooms;
                $booking_hotel_item->person         = $hotel->person;
                $booking_hotel_item->save();
            }
            $success = true;
          } catch (\Exception $e) {
            $alert = [
              "type" => "error",
              "title" => __("Không thành công"),
              "body" => __("Có lỗi đã xảy ra, vui lòng thử lại!")
            ];
            $success = false;
          }
      
          return redirect()->back()->with(compact('alert','success'));
    }
}
