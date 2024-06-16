<template>
  <section id="contacts">
    <div class="container">
      <div class="contact">
        <h2>Контакты</h2>
        <div class="contact-column">
          <div class="column-row">
            <div class="contact-mobile-img">
              <img src="@/assets/img/contacts_ellips.jpg">
            </div>
            <div class="contact-info">
              <!-- <p class="contact-info-text">+7 992 100 99 01</p>
              <p class="contact-info-text">Info@your-startup.space</p> -->
              <a href="tel:+7 (992) 100 99 01" class="contact-info-text">+7 (992) 100 99 01</a>
              <a href="mailto:info@your-startup.space" class="contact-info-text">info@your-startup.space</a>
              <div class="border-text">
                <p class="contact-info-text">Город Ярославль</p>
                <p class="contact-info-text">Улица Победы, д. 35/52</p>
              </div>
            </div>
            <div class="contact-img">
              <img src="@/assets/img/contacts_ellips.jpg">
            </div>
          </div>
          <div class="contact-maps">
            <yandex-map
              :settings="{
                location: {
                  center,
                  zoom,
                },
              }"
            >
            <YandexMapMarker 
              :coords="center" 
              :settings="markerIcon" 
              :icon="markerIcon"
            >
              <div class="marker">
                <svg width="33" height="49" viewBox="0 0 53 69" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M26.5 0.8125C19.4825 0.820461 12.7547 3.61168 7.79256 8.57381C2.83043 13.5359 0.0392109 20.2637 0.03125 27.2812C0.03125 49.9301 24.0938 67.0355 25.1194 67.7514C25.524 68.0348 26.006 68.1868 26.5 68.1868C26.994 68.1868 27.476 68.0348 27.8806 67.7514C28.9062 67.0355 52.9688 49.9301 52.9688 27.2812C52.9608 20.2637 50.1696 13.5359 45.2074 8.57381C40.2453 3.61168 33.5175 0.820461 26.5 0.8125ZM26.5 17.6562C28.4036 17.6562 30.2645 18.2207 31.8474 19.2784C33.4302 20.336 34.6638 21.8392 35.3923 23.5979C36.1208 25.3567 36.3114 27.2919 35.9401 29.159C35.5687 31.0261 34.652 32.7411 33.3059 34.0872C31.9598 35.4332 30.2448 36.3499 28.3777 36.7213C26.5107 37.0927 24.5754 36.9021 22.8167 36.1736C21.0579 35.4451 19.5547 34.2114 18.4971 32.6286C17.4395 31.0458 16.875 29.1849 16.875 27.2812C16.875 24.7285 17.8891 22.2804 19.6941 20.4753C21.4991 18.6703 23.9473 17.6563 26.5 17.6562Z" fill="#E32E2E"/>
                </svg> 
              </div>
              
              </YandexMapMarker>
              <yandex-map-default-scheme-layer />
              <yandex-map-default-features-layer/>
            </yandex-map>
          </div>   
          <!-- <p class="marker-text">улица Победы, 35/52</p> -->
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { YandexMap, YandexMapDefaultSchemeLayer, YandexMapMarker, YandexMapDefaultFeaturesLayer} from "vue-yandex-maps";
const center=[39.871293, 57.632929];
const zoom = 18;

const markerIcon = {
    layout: 'default#image',
    coordinates: [39.871293, 57.632929],
  }
</script>

<style>
.contact-info {
  padding-top: 60px;
  border-bottom: 1px solid var(--dark-gray);
}

.contact-info a{ 
  display: flex;
}
.contact h2 {
  font-size: 100px;
  font-weight: 500;
  line-height: 110px;
  letter-spacing: 0em;
  text-align: left;
  text-transform: uppercase;
  position: relative;
  margin: 60px 0;
}

.contact h2::before {
  content: '';
  position: absolute;
  height: 43px;
  width: 320px;
  top: 0;
  left: -40px;
  background-color: var(--light-accent);
  z-index: -1;
}
.contact-info-text {
  font-size: 16px;
  font-weight: 600;
  line-height: 20px;
  letter-spacing: -0.01em;
  text-align: left;
  padding-bottom: 10px;
}


.contact-column{
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
}
.contact-mobile-img{
  display: none;
}
.border-text{
  padding-top: 150px;
}
.contact-maps {
  border-left: 1px solid var(--dark-gray);
  padding-left: 40px;
  width: 1240px;
  height:640px;
}
.contact-img{
  padding-top: 40px;
}
.contact-img img{
  max-width: 520px;
  max-height: 300px;
  /* border-radius: 50%; */
}
.contact-mobile-img{
  padding-top: 40px;
}
.contact-mobile-img img{
  max-width: 320px;
  max-height: 174px;
  border-radius: 50%;
}

.__ymap-marker_wrapper {
  position: relative;
}

.marker {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translateX(-50%) translateY(-50%);
}

.marker::before {
  content: 'улица Победы, 35/52';
  position: absolute;
  right: 0px;
  top: 75px;
  transform: translateX(100%);
  background-color: #fff;
  font-size: 10px;
  white-space: nowrap; 
  font-weight: bold;
  border-radius: 20px;
  padding: 0 5px;
  margin-top: -70px;
  margin-left: 35px;
}

@media screen and (max-width: 1600px) {
  .contact h2 {
    font-size: 60px;
    line-height: 75px;
  }

  .contact-maps {
    width: 100%;
  }
}

@media screen and (max-width: 1200px) {
  .contact-info{
    padding-top: 20px;
  }

  .contact-img{
    display: none;
  }

  .contact-mobile-img{
    display: block;
    border-bottom: 1px solid var(--dark-gray);
    border-top: 1px solid var(--dark-gray);
    padding: 20px;
  }
  .border-text{
    padding-top: 0;
  }

  .contact-maps {
    border-left: none;
    padding-left: 0;
    padding-top: 20px;
    width: 380px;
    height:195px;
  }

  .contact-info {
    padding-top: 20px;
    border-bottom: none;
  }

  .contact-column{
    flex-direction: column;
  }

  .marker svg{
    width:23px;
    height:39px;
  }
  .marker-text{
    margin-left: 20px;
  }
  .contact  h2 {
    font-size: 26px;
    font-weight: 500;
    line-height: 35px;
    margin: 20px 0;
  }

  .contact h2::before {
    width: 95px;
    height: 15px;
    left: -20px;
  }

  .contact-info-text {
    font-size: 14px;
  }

}
</style>