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
	<div class="flex flex-row justify-center mt-4 text-3xl">
		<div class="flex -mr-1">MCC</div>
		<div class="flex mt-1">&amp;</div>
		<div class="flex mt-2 -ml-1">MNC</div>
	</div>
	<div class="flex m-4 mt-6 p-4 gap-4" style="border: 2px solid aqua;">
		<label class="flex text-center absolute -mt-10 p-2 bg-black text-2xl">NETWORK PROVIDERS</label>
		<div class="flex flex-col justify-between w-full">
			<div class="flex m-2">
				<input class="p-2" placeholder="Title" style="background-color: black; border: 1px solid aqua; outline: none;">
				<button class="p-2" style="background-color: aqua; color: black; border: 1px solid aqua; outline: none;">Search</button>
			</div>
			<div class="flex flex-col m-2">
				<div class="grid grid-cols-10 gap-4 p-4" style="border: 1px solid aqua;">
					<div class="col-span-1 text-center font-semibold" style="border: 1px solid aqua;">MCC</div>
					<div class="col-span-1 text-center font-semibold" style="border: 1px solid aqua;">MNC</div>
					<div class="col-span-3 text-center font-semibold" style="border: 1px solid aqua;">Title</div>
					<div class="col-span-4 text-center font-semibold" style="border: 1px solid aqua;">Operator</div>
					<div class="col-span-1 text-center font-semibold" style="border: 1px solid aqua;">Status</div>
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
						@endif
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
	</div>
</body>
</html>
