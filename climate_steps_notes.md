# Tasks and Notes

Earth Hero to Climate Steps Token
patQQY4t68ftY0MUz.19163a63d03d7264f9d3430b1cec913a8756023c8c031b6d13d1a84258598772
![[Pasted image 20231130154005.png]]
![[Pasted image 20231130154029.png]]

climatesteps_airtable_wp_connection_token
patQvIANvfKctdAw0.266d650b73f79da776ef46ae3f97274a453cb94c5ff2bbb08efb4da26206da77

initial_daily_access_token
pat1SlI2V6XVlSVdo.4f3505699290905357bf075838b5efa265bf8eb882269d98307b1edd83786c69

climatesteps_airtable_wp_api_key
keyoBAKBrl88QSIaL

* Make reuse more accessable
	* Companies can incentivize customers to give them a piece of the pie when the customer re-sells their item. Perhaps the incentive could be a discount given to the customer, which would both reward the customer and the generate more business for the company
	* Running information campaigns to inform people of the importance, impact, and savings that reusing entails
	* Create a business entirely based off of reuse
### Fields to add to data
* another field should be the date a climate action was last displayed
* Seasonal tag: date of when a particular step should be displayed
* do not display: date of when a particular step should not be displayed

### Weekly goals:
* Want ~2-3 years of growth for plugins
* Air-WP [X]
1. Work with Lisa on publishing the CS Weekly Climate Action, first take [X]
2. Ask if WP updates would break WP Sync
3. Researching the premium Air offers for multi datasets [X] . 
5. you meet to discuss EH template and add CO2 to it. Plus image questions.
6. Maybe talk to Ben about images.

### Past Goals:
* Find a way to record a climate action's post date [X]
	* Complex formula involving mod?
* Can it handle ~2000 records worth of data? Yes

### Misc

`daysSinceLastPublished = IF( (todaysActionID - ID) < 0, 
` num_of_actions_in_database  - (ID - todaysActionID),
`todaysActionID - ID) 

Where 
`todaysActionID = MOD(DATETIME_DIFF(TODAY(),DATETIME_PARSE('0001-01-01'), 'days'), num_of_actions_in_database)`


