@extends('layouts.app')

@section('content')
<div class="container">

    <accomodation-index></accomodation-index>

    {{-- @foreach($accomodations as $accomodation)

        
         <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $accomodation->title }}</h5>
                <p class="card-text">{{ $accomodation->description }}</p>
                <a href="{{ route('guest.show', ['id' => $accomodation->id]) }}" class="card-link">Viasualizza</a>
            </div>
        </div>  

    @endforeach --}}
    


    {{-- 
    chiamata api 

    1 creo componente nella cartella resources -js-components : AccomodationIndex.vue
    2 lo importo con il trattivo in mezzo in file index.blade e scrivo : <accomodation-index>  </accomodation-index>
    3 dentro il file AccomodationIndex.vue avrò il template e lo script
    4 nel template farò il div con dentro il componente <accomodation-list v-for=""></accomodation-list>
    5 ricordati di caricare nel file app.js il componente AccomdationIndex
    6 e scrivere il name: "AccomodationIndex" nello scritp di AccomodationIndex

    7 creiamo il data () {
        return {

            allAccomadtion : [],
            accomodationFiltrati: []
        }
    }
    e il mounted 
    in pakagese ajos è inst axios?
    8 nello script di AccomodationIndex
    scrivo 
    import axios from "axios";
    


    adesso nel mounted() {
        axios.get("/api/posts")
        .then (resp =>  {
            this.allAccomadtion =resp.data.results;
            this.accomodationFiltrati =resp.data.results;

        })
        .catch(er => {
            alert 
        })
    }

    nel template di AccomodationIndex 
    ho il componente accomation-list

        e ci scrivo il v-for="accomodation in accomodationFiltrati"
        :key="accomodation.id"     
        e con il v-bind
        :title="accomodation.title"   


        nella cartella controller api postcontroller
        dove ci ritornano tutti i posts
         faccio il foreach () {
             $post->cover_url =
             $post->cover_url ? asset ('storage/' . $post->cover_url : 'http...');

             $post->link = route("posts.index", ["slug" =>$post->slug]);

             per tronacare la descrizione
             if(strlen ($post->description  ) > 80 )
             $post->description = substr($post->description, 0, 80);

         }

         e in accomodationlist scriverò v-html="description" ovvero il nome della props

            quindi in index.blade abro solo il componente accomodation-index

            nel file accomodationIndex.vue
            avrò form 
            @submit.prevent="filterData"
            nello stesso file nello script 
            aggiungo dopo data 
            methods: {
                filterData() {

                }
            }

        
            - creo in resourses-js-components-la cartella 
            formInputs e dentro 
            il file TextInput.vue  e lo carico in app.js
             e poi il componente text-input lo utilizzo
              in 
            accomodationIndex.vue dentro al form 

            nel file TextInput 
            avrò label e input con dentro i tag :type="nomeProps"

            - l'elemento sul quale voglio creare il v-model
            input devo creare il :value="value" e anche come props
            value: String

            - per comunicare i dati al componente padre
            faccio @input="$emit ('input' , $event.currentTarget.value)"

    in questo modo recupero il dato che è stato comunicato all'input 
    al padre accomodationIndex.vue

    PER APPLICARE I FILTRI 
    quindi nel file accomodationIndex.vue 
    avro il <form @submit.prevent="filterData" 
    e il componente <text-input label="titolo" 
    v-model="filters.title">

    per ogni label scriverò un componente <text-input>
    nel form avrò button type submit filtra e un type reset annulla

    in script
    in data () {
        return {
            filters: {
                title: "",
                categories: null
            },
          tagsList: []
        }
    }

    in mounted() {

    } avrò la seconda chiamata
     axios 
    .get ("/api/tags")
    .then( resp => {
        this.tagsList =resp.data.results;
    })
------
    creo  api/ categoryController 
    function index()
    return response()->json([
        "success" => true,
        "results" => Category::all()
    ])

    in rotte.apiphp aggiornare la rotta 
    get("/categories", "Api\CategoryController@index")

----
file multicheck.vue
props: {
    items: {
        type: Array, 
        required:true
    },
    value: Array 
}

nel template di multiche.vue
 un v-for item in items  :key="item.id"
 label e input type checkbox :value="item.id"
{{item.name}}

----
inPostIndex. uso il componente multi-check
v-model="filters.categories"
:items="tagsList"


---
in multicheck 
nel tag input 
@change="onChange"

data() {
    return {

    selectedValue:[]
    }
},
in methods: {
    onChange(ev) {
        const valuechecked = ev.target.checked;
        if(valuechecked) {
    
            this.selectedValue.push(ev.target.value) --> value perchè nell'input c'è :value="item.id"
        } else {
            const index=this.selectedValue.indexOf(ev.target.value);
            this.selectedValue.splice(index, 1);
        }
        this.$emit("input", this.selectedValue)
    }
}

in postIndex
in methods: {
    filterData() {
        axios
        .get("/api/posts/filter", {
            params: this.filters
        })



    }

    
}

     --}}

    {{-- @foreach($accomodations as $accomodation)
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $accomodation->title }}</h5>
            <p class="card-text">{{ $accomodation->description }}</p>
            <a href="{{ route('guest.show', ['id' => $accomodation->id]) }}" class="card-link">Viasualizza</a>
        </div>
    </div>




    @endforeach --}}

</div>
@endsection
