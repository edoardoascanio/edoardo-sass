<template>
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

  
</template>

<script>
export default {
  name: "AccomodationIndex",
  
  data() {
    return {
      originalAccomodation: [],
      filteredAccomodation: [], 
      z: [],


      // urlGetPosition: "https://api.tomtom.com/search/2/geocode/" + accomodation.province + "%20" + accomodation.city + "%20" + accomodation.type_street + "%20" + accomodation.street_name + "%20" + accomodation.building_number + ".json?Key=t4QufcKAvdkiBeKqaOB5kwMYk71Rx8b6",
    };
  },

  computed: {
  
  },
  methods: {
    callAccomodation() {
      axios
        .get("/api/accomodation")
        .then((resp) => {

          this.originalAccomodation = resp.data.results.data;

         
          this.filteredAccomodation = resp.data.results.data;
          if(this.originalAccomodation.length > 1) {
            this.callMap();
    
          }
        })
        .catch((er) => {
          alert("errore");
        });
    },
    callMap() {
      this.originalAccomodation.forEach(accomodation => {
      var compactStreetName = accomodation.street_name.replace(/\s/g, '');
   
      var urlGetPosition = "https://api.tomtom.com/search/2/geocode/" + accomodation.province + "%20" + accomodation.city + "%20" + accomodation.type_street + "%20" + compactStreetName + "%20" + accomodation.building_number + ".json?Key=t4QufcKAvdkiBeKqaOB5kwMYk71Rx8b6";
    
       axios
        .get(urlGetPosition)
        .then((resp) => {

          // this.z.push(resp.data.results.position);
         console.log(resp)
        })
        .catch((er) => {
          alert("errore");
        });

      });
    },
  },

  mounted() {
    this.callAccomodation();
    this.callMap();
  },
};
</script>

