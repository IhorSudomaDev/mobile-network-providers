@php
	use App\Models\NetworkProvider;
	
	/*** @var NetworkProvider $provider */
	//$providers = NetworkProvider::paginate(10);
	$providers = networkProviderController()->fetchAll();
@endphp
	<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<title>Network Providers</title>
	
	<!-- Links -->
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
		integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
	
	<!-- Styles -->
	<style>
	</style>
</head>
<body class="antialiased">
	@csrf
	<div class="flex flex-row justify-center mt-4 text-3xl">
		<div class="flex -mr-1">MCC</div>
		<div class="flex mt-1">&amp;</div>
		<div class="flex mt-2 -ml-1">MNC</div>
	</div>
	<div class="flex m-4 mt-6 p-4 gap-4" style="border: 2px solid aqua;">
		<label class="flex text-center absolute -mt-10 p-2 bg-black text-2xl">NETWORK PROVIDERS</label>
		<div class="flex flex-col justify-between w-full z-0">
			<div class="flex m-2">
				<input class="p-2" placeholder="Title" style="background-color: black; border: 1px solid aqua; outline: none;">
				<button class="p-2" style="background-color: aqua; color: black; border: 1px solid aqua; outline: none;">Search</button>
			</div>
			<div class="flex flex-col m-2">
				<div class="grid grid-cols-11 gap-4 p-4" style="border: 1px solid aqua;">
					<div class="col-span-1 text-center font-semibold" style="border: 1px solid aqua;">MCC</div>
					<div class="col-span-1 text-center font-semibold" style="border: 1px solid aqua;">MNC</div>
					<div class="col-span-3 text-center font-semibold" style="border: 1px solid aqua;">Title</div>
					<div class="col-span-4 text-center font-semibold" style="border: 1px solid aqua;">Operator</div>
					<div class="col-span-1 text-center font-semibold" style="border: 1px solid aqua;">Status</div>
					<div class="col-span-1 text-center font-semibold" style="border: 1px solid aqua;">Info</div>
					@foreach( $providers as $provider )
						<div class="col-span-1">{{ $provider->mcc }}</div>
						<div class="col-span-1">{{ $provider->mnc }}</div>
						<div class="col-span-3">{{ $provider->title }}</div>
						<div class="col-span-4">{{ $provider->operator }}</div>
						@if( $provider->status === 'Operational' )
							<div class="col-span-1" style="color: green;">{{ $provider->status }}</div>
						@elseif( $provider->status === 'Reserved' )
							<div class="col-span-1" style="color: darkorange;">{{ $provider->status }}</div>
						@elseif( $provider->status === 'Unknown' )
							<div class="col-span-1" style="color: white;">{{ $provider->status }}</div>
						@elseif( $provider->status === 'Not Operational' )
							<div class="col-span-1" style="color: red;">{{ $provider->status }}</div>
						@elseif( $provider->status === 'Ongoing' )
							<div class="col-span-1" style="color: yellow;">{{ $provider->status }}</div>
						@elseif( $provider->status === 'Implement/Design' )
							<div class="col-span-1" style="color: blueviolet;">{{ $provider->status }}</div>
						@elseif( $provider->status === 'Planned' )
							<div class="col-span-1" style="color: blue;">{{ $provider->status }}</div>
						@elseif( $provider->status === 'Temporary Operational' )
							<div class="col-span-1" style="color: lightgreen;">{{ $provider->status }}</div>
						@endif
						<div class="col-span-1">
							<button id="js-show-info-{{ $provider->id }}" class="js-show-info text-sm pl-2 pr-2" value="{{ $provider->id }}" style="border: 1px solid aqua;">Show</button>
						</div>
					@endforeach
				</div>
			</div>
			<div class="flex justify-center m-2">
				{{ $providers->links() }}
			</div>
			<div class="flex m-2">
				<div>Actual info on 2024-01-22</div>
			</div>
		</div>
		
		<div class="flex-row items-center absolute shadow-md z-50 w-1/2 ml-20" id="js-info" style="display: none; border: 4px solid aqua; z-index: 10;">
			<div class="flex justify-end items-end h-3" style="background-color: aqua;">
				<div class="flex">
					<svg class="js-close-popup cursor-pointer" width="16" height="16" viewBox="0 0 24 24" style="color: black;" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd"
							d="M3.85566 3.85566C4.32986 3.38145 5.09871 3.38145 5.57292 3.85566L12 10.2827L18.4271 3.85566C18.9013 3.38145 19.6701 3.38145 20.1443 3.85566C20.6186 4.32986 20.6186 5.09871 20.1443 5.57292L13.7173 12L20.1443 18.4271C20.6186 18.9013 20.6186 19.6701 20.1443 20.1443C19.6701 20.6186 18.9013 20.6186 18.4271 20.1443L12 13.7173L5.57292 20.1443C5.09871 20.6186 4.32986 20.6186 3.85566 20.1443C3.38145 19.6701 3.38145 18.9013 3.85566 18.4271L10.2827 12L3.85566 5.57292C3.38145 5.09871 3.38145 4.32986 3.85566 3.85566Z"/>
					</svg>
				</div>
			</div>
			<label class="absolute mt-5 ml-8 pl-2 pr-2" style="background-color: black; color: aqua;">PROVIDER INFO</label>
			<div class="flex gap-4 p-4 w-full p-2 bg-black items-center" style="color: aqua;">
				<div class="flex flex-col grid grid-cols-12 w-full gap-4 p-4 mt-4" style="border: 2px solid aqua;">
					<div class="flex flex-col col-span-3 gap-4 mt-2">
						<div class="">Title</div>
						<div class="">Operator</div>
						<div class="">MNC</div>
						<div class="">Status</div>
					</div>
					<div class="flex flex-col col-span-9 gap-4">
						<div class="flex pl-2 pr-2" id="js-provider-title" style="border: 1px solid aqua;"></div>
						<div class="flex pl-2 pr-2" id="js-provider-operator" style="border: 1px solid aqua;"></div>
						<div class="flex pl-2 pr-2" id="js-provider-mnc" style="border: 1px solid aqua;"></div>
						<div class="flex pl-2 pr-2" id="js-provider-status" style="border: 1px solid aqua;"></div>
					</div>
				</div>
			</div>
			
			<label class="absolute mt-5 ml-8 pl-2 pr-2" style="background-color: black; color: aqua;">COUNTRY INFO</label>
			<div class="flex gap-4 p-4 w-full p-2 bg-black items-center" style="color: aqua;">
				<div class="flex flex-col grid grid-cols-12 w-full gap-4 p-4 mt-4" style="border: 2px solid aqua;">
					<div class="flex flex-col col-span-3 gap-4 mt-2">
						<div class="">Title</div>
						<div class="">Code</div>
						<div class="">Region</div>
						<div class="">MCC</div>
					</div>
					<div class="flex flex-col col-span-9 gap-4">
						<div class="flex pl-2 pr-2" id="js-country-title" style="border: 1px solid aqua;"></div>
						<div class="flex pl-2 pr-2" id="js-country-code" style="border: 1px solid aqua;"></div>
						<div class="flex pl-2 pr-2" id="js-country-region" style="border: 1px solid aqua;"></div>
						<div class="flex pl-2 pr-2" id="js-country-mcc" style="border: 1px solid aqua;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script type="application/javascript">
	$(document).ready(function () {
		"use strict";

		let $showInfoButton = $(".js-show-info");

		$showInfoButton.unbind("click").on("click", function (event) {
			event.preventDefault();

			let validate = "js-show-info-",
				showId = $(this).attr("id"),
				id = showId.slice(validate.length, showId.length);

			$.ajaxSetup({
				headers: {
					"X-CSRF-TOKEN": $("meta[name=\"csrf-token\"]").attr("content")
				}
			});

			$.ajax({
				type:     "POST",
				url:      "{{ route('popup.show-info') }}",
				dataType: "json",
				data:     {
					network_provider_id: id
				},
				success:  function (data) {
					if (data["success"]) {
						$("#js-provider-title").text(data["title"]);
						$("#js-provider-operator").text(data["operator"]);
						$("#js-provider-mnc").text(data["mnc"]);
						$("#js-provider-status").text(data["status"]);
						$("#js-country-title").text(data["country"]);
						$("#js-country-code").text(data["country_code"]);
						$("#js-country-region").text(data["region"]);
						$("#js-country-mcc").text(data["mcc"]);
						$("#js-info").show(500);
						//$showInfoButton.attr("disabled", "disabled");
					}
				}
			});
			//$showInfoButton.prop("disabled", true);
		});

		$(".js-close-popup").unbind("click").on("click", function (event) {
			event.preventDefault();
			$("#js-info").hide(500);
		});

	});
</script>
