/*slider_id is the id of the slider composite to be disabled or enabled,
checkbox is the checkbox that will perform the toggle when clicked,
and title_id is the title that will be greyed out*/
function toggleSlider(checkbox, slider_id, title_id) {
    document.getElementById(checkbox).addEventListener("click", (event) => {
            document.getElementById(slider_id).classList.toggle("disabled_element")
            document.getElementById(title_id).classList.toggle("disabled_title")
        });

}

/* toggles between hiding and showing the element `drop_down` */
function toggleDropDown(drop_down, c) {
    //opens and closes the dropdown
    document.getElementById(drop_down).classList.toggle("show");
    
    //toggles the chevron `c` between pointing up and pointing down
    if(c != null) {
        document.getElementById(c).classList.toggle("fa-chevron-down")
        document.getElementById(c).classList.toggle("fa-chevron-up")
    }
}

//Function for Location-based sliders
function location_updater(slider, slider_list) {
    slider.addEventListener("click", (event) => {
        
        //Ensures only one tick is bolded at a time
        for(i=0; i<slider_list.length; i++) {
            slider_list[i].classList.remove("bold_tick")
        }

        if (event.target.value < 13) {
            slider_list[0].classList.add("bold_tick");
        } else if (event.target.value < 38) {
            slider_list[1].classList.add("bold_tick");
        } else if (event.target.value < 63) {
            slider_list[2].classList.add("bold_tick");
        } else if (event.target.value < 88) {
            slider_list[3].classList.add("bold_tick");
        } else {
            slider_list[4].classList.add("bold_tick");
        }
    })  
}




//Health Impact
const health_impact = document.querySelector("#health_impact");
const hi_list = document.getElementById("hi_list").options;
health_impact.addEventListener("click", (event) => {

    //Ensures only one tick is bolded at a time
    for(i=0; i<hi_list.length; i++) {
        hi_list[i].classList.remove("bold_tick")
    }

    if (event.target.value < 33) {
        hi_list[0].classList.add("bold_tick")
    } else if (event.target.value > 66) {
        hi_list[2].classList.add("bold_tick")
    } else {
        hi_list[1].classList.add("bold_tick")
    }
});

toggleSlider("hi_checkbox", "hi_slider_composite", "hi_title");




//Lineage Impact
const lineage_impact = document.querySelector("#lineage_impact");
const li_list = document.getElementById("li_list").options;
lineage_impact.addEventListener("click", (event) => {

    //Ensures only one tick is bolded at a time
    for(i=0; i<li_list.length; i++) {
        li_list[i].classList.remove("bold_tick");
    }

    if (event.target.value < 13) {
        li_list[0].classList.add("bold_tick");
    } else if (event.target.value < 38) {
        li_list[1].classList.add("bold_tick");
    } else if (event.target.value < 61) {
        li_list[2].classList.add("bold_tick");
    } else {
        li_list[3].classList.add("bold_tick");
    }
});
toggleSlider("li_checkbox", "li_slider_composite","li_title");



//Lineage Impact
const biodiversity_impact = document.querySelector("#biodiversity_impact");
const bi_list = document.getElementById("bi_list").options;
biodiversity_impact.addEventListener("click", (event) => {

    //Ensures only one tick is bolded at a time
    for(i=0; i<bi_list.length; i++) {
        bi_list[i].classList.remove("bold_tick");
    }

    if (event.target.value < 33) {
        bi_list[0].classList.add("bold_tick");
    } else if (event.target.value < 66) {
        bi_list[1].classList.add("bold_tick");
    } else {
        bi_list[2].classList.add("bold_tick");
    }
});
toggleSlider("bi_checkbox", "bi_slider_composite","bi_title");



//Carbon Impact
const carbon_impact = document.querySelector("#carbon_impact");
const ci_list = document.getElementById("ci_list").options;
location_updater(carbon_impact, ci_list);
toggleSlider("ci_checkbox", "ci_slider_composite","ci_title");



//Enviornmental Justice
const enviornmental_justice = document.querySelector("#enviornmental_justice");
const ej_list = document.getElementById("ej_list").options;
location_updater(enviornmental_justice, ej_list);
toggleSlider("ej_checkbox", "ej_slider_composite", "ej_title");



//Action Range
const mental_ease = document.querySelector("#mental_ease");
const ar_list = document.getElementById("ar_list").options;
location_updater(mental_ease, ar_list);
toggleSlider("me_checkbox", "me_slider_composite", "me_title");



//Action Location
const action_location = document.querySelector("#action_location");
const al_list = document.getElementById("al_list").options;
location_updater(action_location, al_list);
toggleSlider("al_checkbox", "al_slider_composite","al_title");



//Ease
const ease = document.querySelector("#ease");
const e_list = document.getElementById("e_list").options;
ease.addEventListener("click", (event) => {
    //Ensures only one tick is bolded at a time
    for(i=0; i<e_list.length; i++) {
        e_list[i].classList.remove("bold_tick");
    }

    if (event.target.value < 20) {
        e_list[0].classList.add("bold_tick");
    } else if (event.target.value < 50) {
        e_list[1].classList.add("bold_tick");
    } else if (event.target.value < 80) {
        e_list[2].classList.add("bold_tick");
    } else if (event.target.value < 100) {
        e_list[3].classList.add("bold_tick");
    }
})
toggleSlider("e_checkbox", "e_slider_composite", "e_title");



//Skills
const skills = document.querySelector("#skills");
const as_list = document.getElementById("as_list").options;
skills.addEventListener("click", (event) => {
    //Ensures only one tick is bolded at a time
    for(i=0; i<as_list.length; i++) {
        as_list[i].classList.remove("bold_tick");
    }

    if (event.target.value < 33) {
        as_list[0].classList.add("bold_tick");
    } else if (event.target.value < 66) {
        as_list[1].classList.add("bold_tick");
    } else {
        as_list[2].classList.add("bold_tick");
    }
})
toggleSlider("as_checkbox", "as_slider_composite", "as_title");



//Social Acceptability
const social_acceptability = document.querySelector("#social_acceptability");
const sa_list = document.getElementById("sa_list").options;
social_acceptability.addEventListener("click", (event) => {
    //Ensures only one tick is bolded at a time
    for(i=0; i<sa_list.length; i++) {
        sa_list[i].classList.remove("bold_tick");
    }        
    
    if (event.target.value < 20) {
        sa_list[0].classList.add("bold_tick");
    } else if (event.target.value < 50) {
        sa_list[1].classList.add("bold_tick");
    } else if (event.target.value < 80) {
        sa_list[2].classList.add("bold_tick");
    } else {
        sa_list[3].classList.add("bold_tick");
    }
})
toggleSlider("sa_checkbox", "sa_slider_composite", "sa_title");



//Action Financing
const action_financing = document.querySelector("#action_financing");
const af_list = document.getElementById("af_list").options;
action_financing.addEventListener("click", (event) => {
    //Ensures only one tick is bolded at a time
    for(i=0; i<af_list.length; i++) {
        af_list[i].classList.remove("bold_tick");
    }        
    
    if (event.target.value < 20) {
        af_list[0].classList.add("bold_tick");
    } else if (event.target.value < 50) {
        af_list[1].classList.add("bold_tick");
    } else if (event.target.value < 80) {
        af_list[2].classList.add("bold_tick");
    } else {
        af_list[3].classList.add("bold_tick");
    }
})
toggleSlider("af_checkbox", "af_slider_composite", "af_title");



//Sociality
const sociality = document.querySelector("#sociality");
const s_list = document.getElementById("s_list").options;
sociality.addEventListener("click", (event) => {
    //Ensures only one tick is bolded at a time
    for(i=0; i<s_list.length; i++) {
        s_list[i].classList.remove("bold_tick");
    }

    if (event.target.value < 33) {
        s_list[0].classList.add("bold_tick");
    } else if (event.target.value < 66) {
        s_list[1].classList.add("bold_tick");
    } else {
        s_list[2].classList.add("bold_tick");
    }
})
toggleSlider("s_checkbox", "s_slider_composite", "s_title");

if (sociality) {
    console.log("Yes, it exists!")
} else {
    console.log("No, it doesn't!")
}