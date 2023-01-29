<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<div class="container">
@include('header')
@include('mainImage')
@include('about')

<div class="commonContainer" style="text-align: left; background-color: #F5F5F5;">
            <div class="textArea" style="width:80%; margin: auto">
                <div style="display: inline-block; width:55%; ">
                    <h1 style="margin-bottom: -20px;">OUR PRODUCTS</h1>
                    <h3>
                        Aqualine only stocks items<br>we gurantee you can rely on.
                    </h3>
                </div>
                <div style="display: inline-block; width:43%">
                    <p>Aqualine Products Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sodales
                        sapien diam, eu bibendum erat iaculis sed. In faucibus condimentum orci, mollis aucto.</p>
                </div>
            </div>
            <div class="productsArea">
                
                @foreach($collection as $col)
				<div class="card">
                    <div class="cardImage">
					<img src="{{asset('/storage/images/'.$col->image) }}" alt="" title="" style = " max-height: 100%; ">
                    </div>
                    <div class="cardData">
                        <div class="cardIcon">
                        <img src="{{asset('/'.$col->icon_url) }}" alt="" title="" style = " max-height: 100%; ">
                        </div>
                        <div class="cardTitle">
						{{$col['title']}}
                        </div>
                    </div>
                </div>
			@endforeach
            </div>
        </div>


@include('partners')
@include('merchant')
@include('footer')
</div>





