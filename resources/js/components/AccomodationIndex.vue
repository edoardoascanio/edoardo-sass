<template>
  <div>

    <div class="card bg-light">

      <div class="card-body"> 
        
        <form @submit.prevent="filterData">
          <div class="row">
            <text-input label="Ricerca Indirizzo Appartamento"
            v-model="filters.address"
            >
            </text-input> 

            <text-input label="N. minimo di stanze"
            v-model="filters.minNRooms"
            >
            </text-input>  

            <text-input label="N. minimo di letti"
            v-model="filters.minNBeds"
            >
            </text-input> 

            <text-input label="Distanza"
            v-model="filters.distance"
            >
            </text-input>  

            <div class="row">
              <text-input 
              
              >  
              <label  v-for="service in services" :key="service.id" >

              </label>
              
              <input :type="checkbox" v-model="filters.services">
              </text-input>  
            </div>
          </div>


        </form> 
        
    </div>
    </div>

    <div class="row">
      <div class="col-4">
        <div
          v-for="accomodation in filteredAccomodation"
          :key="accomodation.id"
          class="card"
          style="width: 100%">

          <div class="card-body">
            <h5 class="card-title">{{ accomodation.title }}</h5>
            <p class="card-text">{{ accomodation.description }}</p>    
            <a :href="accomodation.link" class="card-link">Visualizza</a> 
          </div>

        </div>

        
            
      </div>


      <div class="col-8">

        
        <!-- <div id="map" class="map"></div> -->
      </div>
    </div>
  </div>

  
</template>

<script>

export default {
  name: "AccomodationIndex",
  data() {
    return {
      originalAccomodation: [],
      filteredAccomodation: [], 
      filters: {
        address: "",
        minNRooms: "",
        minNBeds: "",
        distance: "",
        services: null
      },
      services: [],
      // urlGetPosition: "https://api.tomtom.com/search/2/geocode/" + accomodation.province + "%20" + accomodation.city + "%20" + accomodation.type_street + "%20" + accomodation.street_name + "%20" + accomodation.building_number + ".json?Key=t4QufcKAvdkiBeKqaOB5kwMYk71Rx8b6",
    };
  },

  computed: {
  
  },
  methods: {
    callAccomodation() {
      axios
        .get("/api/accomodation")
        .then(resp => {

          this.originalAccomodation = resp.data.results.data;

         
          this.filteredAccomodation = resp.data.results.data;
          if(this.originalAccomodation.length > 1) {
            this.callMap();
    
          }
        })
        .catch((er) => {
          console.log(er)
        });
    },
    // callMap() {
    //   this.originalAccomodation.forEach(accomodation => {
    //   var compactStreetName = accomodation.street_name.replace(/\s/g, '');
   
    //   var urlGetPosition = "https://api.tomtom.com/search/2/geocode/" + accomodation.province + "%20" + accomodation.city + "%20" + accomodation.type_street + "%20" + compactStreetName + "%20" + accomodation.building_number + ".json?Key=t4QufcKAvdkiBeKqaOB5kwMYk71Rx8b6";
    
    //    axios
    //     .get(urlGetPosition, {
    //         headers: {
              
    //         }
    //      }) 
    //     .then((resp) => {

    //       // this.z.push(resp.data.results.position);
    //      console.log(resp)
    //     })
    //     .catch((er) => {
    //       console.log(er)
    //     });

    //   });
    // },

    filteredData() {
      
    },
    callServices() {
      axios.get("/api/services")
      .then(resp => {
        this.services = resp.data.results;
      })
    }
  },

  mounted() {
    this.callAccomodation();
    // this.callMap();
    this.callServices();

  },
};
</script>

