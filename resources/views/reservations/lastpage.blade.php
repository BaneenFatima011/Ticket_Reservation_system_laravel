@extends('layout')
@section('content')




<div class="container">
<p class="text-center text-red-500 text-bold text-xl">Reservation expires at {{$expiryTime}}</p>
	<div class="ticket basic">
		<p>Admit One</p>
	</div>

	<div class="ticket airline">
		<div class="top">
			<h1>Ticket</h1>
			<div class="big">
				<p class="from uppercase">{{$route->originCity->city_name}}</p>
				<p class="to uppercase"><i class="fas fa-arrow-right"></i> {{$route->destinationCity->city_name}}</p>
			</div>
			
		</div>
		<div class="bottom">
			<div class="column">
				<div class="row row-1">
					<p><span>{{ $route->transport->transportType->transport_name }}</span>{{ $route->transport->model }}</p>
					<p class="from "> <span>Reservation Id:</span><span class="font-bold">{{$reservationId}}</span></p>

					
				</div>
				<div class="row row-2">
					<p><span>Duration</span>{{ $route->duration }}</p>
					<p class="row--center"><span>Departs</span>{{ $route->departure_time }}</p>
					<p class="row--right"><span>Arrives</span>{{ $route->arrival_time }}</p>
				</div>
				<div class="row row-3">
					<p><span>Passenger</span>{{$passengername}}</p>
					<p class="row--center"><span>Seat</span>{{$seatId}}</p>
					<p class="row--right"><span>Group</span>3</p>
				</div>
			</div>
			
		</div>
	</div>
	<div class="text-center mt-4">
        <a href="/reservations " class="bg-sky-500">&laquo; Back</a>
    </div>
	
	</div>

</div>
@stop
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

<style>
   @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap");

;



p,
h1 {
	margin: 0;
	padding: 0;
	font-family: '"Open Sans", sans-serif';
}
@import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap");

.container {
    /* Remove or change the background color */
    background: none;
    position: relative;
    width: 100%;
    height: 100vh;
    .ticket {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .basic {
        display: none;
    }
}

.airline {
    display: block;
    max-width: 100%;
    height: auto;
    box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.3);
    border-radius: 25px;
    z-index: 3;
    .top {
        height: 220px;
        background: #ffcc05;
        border-top-right-radius: 25px;
        border-top-left-radius: 25px;
        h1 {
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 2;
            text-align: center;
            position: absolute;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
        }
    }
    .bottom {
        height: auto;
        background: #fff;
        border-bottom-right-radius: 25px;
        border-bottom-left-radius: 25px;
    }
}

@media only screen and (max-width: 768px) {
    .airline {
        width: 90%;
        margin: 0 auto;
    }
}

@media only screen and (max-width: 576px) {
    .airline {
        width: 100%;
        border-radius: 0;
        box-shadow: none;
    }
    .bottom {
        padding-bottom: 20px;
    }
}

/* Other styles remain unchanged */

.container {
    /* Remove or change the background color */
    background: none;
    position: relative;
    width: 100%;
    height: 100vh;
    .ticket {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .basic {
        display: none;
    }
}
.airline {
	display: block;
	height: 575px;
	width: 270px;
	box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.3);
	border-radius: 25px;
	z-index: 3;
	.top {
		height: 220px;
		background: #ffcc05;
		border-top-right-radius: 25px;
		border-top-left-radius: 25px;
		h1 {
			text-transform: uppercase;
			font-size: 12px;
			letter-spacing: 2;
			text-align: center;
			position: absolute;
			top: 30px;
			left: 50%;
			transform: translateX(-50%);
		}
	}
	.bottom {
		height: 355px;
		background: #fff;
		border-bottom-right-radius: 25px;
		border-bottom-left-radius: 25px;
	}
}

.top {
	.big {
		position: absolute;
		top: 100px;
		font-size: 65px;
		font-weight: 700;
		line-height: 0.8;
		.from {
			color:   #ffcc05;
			text-shadow: -1px 0 #000, 0 1px #000, 1px 0 #000, 0 -1px #000;
		}
		.to {
			position: absolute;
			left: 32px;
			font-size: 35px;
			display: flex;
			flex-direction: row;
			align-items: center;
			i {
				margin-top: 5px;
				margin-right: 10px;
				font-size: 15px;
			}
		}
	}
	.side {
		position: absolute;
		right: 35px;
		top: 110px;
		text-align: right;
		i {
			font-size: 25px;
			margin-bottom: 18px;
		}
		p {
			font-size: 10px;
			font-weight: 700;
		}
		p + p {
			margin-bottom: 8px;
		}
	}
}
.bottom {
	p {
		display: flex;
		flex-direction: column;
		font-size: 13px;
		font-weight: 700;
		span {
			font-weight: 400;
			font-size: 11px;
			color: #6c6c6c;
		}
	}
	.column {
		margin: 0 auto;
		width: 80%;
		padding: 2rem 0;
	}
	.row {
		display: flex;
		justify-content: space-between;
		&--right {
			text-align: right;
		}
		&--center {
			text-align: center;
		}
		&-2 {
			margin: 30px 0 60px 0;
			position: relative;
			&::after {
				content: "";
				position: absolute;
				width: 100%;
				bottom: -30px;
				left: 0;
				background: #000;
				height: 1px;
			}
		}
	}
}

.bottom {
	.bar--code {
		height: 50px;
		width: 80%;
		margin: 0 auto;
		position: relative;
		&::after {
			content: "";
			position: absolute;
			width: 6px;
			height: 100%;
			background: #000;
			top: 0;
			left: 0;
			box-shadow: 10px 0 #000, 30px 0 #000, 40px 0 #000, 67px 0 #000, 90px 0 #000,
				100px 0 #000, 180px 0 #000, 165px 0 #000, 200px 0 #000, 210px 0 #000,
				135px 0 #000, 120px 0 #000;
		}
		&::before {
			content: "";
			position: absolute;
			width: 3px;
			height: 100%;
			background: #000;
			top: 0;
			left: 11px;
			box-shadow: 12px 0 #000, -4px 0 #000, 45px 0 #000, 65px 0 #000, 72px 0 #000,
				78px 0 #000, 97px 0 #000, 150px 0 #000, 165px 0 #000, 180px 0 #000,
				135px 0 #000, 120px 0 #000;
		}
	}
}

.info {
	position: absolute;
	left: 50%;
	transform: translateX(-50%);
	bottom: 10px;
	font-size: 14px;
	text-align: center;
	z-index: 1;
	a {
		text-decoration: none;
		color: #000;
		background:  #ffcc05;
	}
}

</style>

