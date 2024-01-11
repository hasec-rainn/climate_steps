# Plugins

### Air WP Sync – Airtable to WordPress
Pros
* Intuitive & easy-to-use UI
* Seems to be actively supported (last update 1 month ago, 900+ active installations) and should work for the foreseeable future
* Automatically refreshes and publishes new climate action each day

Cons
* Some fields (eg, Formula and Lookup) cannot be imported
	* Makes certain approaches to Daily Climate Actions impossible

### Aeropage Sync for Airtable

 Notes
 * Auto Sync is every 10 minutes
	 * Don't need it to be so frequent, but could be a good thing
	 * May unnecessarily use up bandwidth/resources, however

Pros to be determined

Cons
* Not as popular
	* Only ~90 installations
	* More likely to be deprecated in the future?

<div style="page-break-after: always"></div>

### Zapier
Pros
* UI is intuitive

Cons
* Some features are not made apparent (have to look around to find out how to do a specific task/thing)
* Cost-to-features ratio
	* Automations that can be run on free plan are limited in scope
	* Price rises quickly when number/complexity of automations increase
* WP connection for Zapeir, "Zapier for Wordpress"
	* Hasn't been updated in over a year
	* 2 star rating

<div style="page-break-after: always"></div>

# Potential Solutions
Below are some potential solutions that could be used to post a daily climate action. The solutions listed below could be implemented immediately.

## ~~Air WP Sync Integrated Solution Approach~~
* Uses Air WP Sync
* Is integrated into the `Actions` table in the `Actions Database`

![[Pasted image 20230725121123.png|1000]]
* Will contain all the normal fields for the `Actions` table (as seen above) plus the following fields: "Label Constant", "total_num_records", and "Last Published".

Pros
* New Action is dynamically/automatically selected each day 
	* no need to manually define which action will be displayed on which day (unlike Marked 365 Days Approach)
* Will automatically cycle through Actions in order via a formula $f$
	* Can be used to ensure that Actions with the oldest `Last Published` date are published every day
	* Can be guaranteed so long as `add_cs_step_view` view is used when adding a new record and `total_num_records` is kept up to date

Cons
* Difficult to assign a specific action to a specific date
	* Since actions are posted based off their order, would need to figure out where to place an Action in order for it to be posted on a specific date
* The value `total_num_records` in the formula $f$ is problematic:
	* Appears `total_num_records` may have to be updated manually...
	* In this case, human error may lead to not all the records being cycled through and incorrect last published dates
	* The more often Actions are being added to the Database, the more problematic this would become
	* Want to find way to resolve this problem, as this is very inconvinent. Unfortunately: 
		* Looking through Airtable's API documentation, it appears there isn't a code-based solution
		* There doesn't appear to be a solution via Air Table; specifically, automations don't allow scripts on free plan, unfortunately

<div style="page-break-after: always"></div>


## Air WP Sync: Marked 365 Days Approach
* Uses Air WP Sync
* Is integrated into the `Actions` table in the `Actions Database`

![[Pasted image 20230725121123.png|1000]]
* Will contain all the normal fields for the `Actions` table (as seen above) plus the following fields: "Publish On Date" and "Last Published"
	* `Publish On Date`: a string containing a date formatted as `mm-dd-yyyy`. Used by Air WP Sync to determine when an action should be published to the website. Manually entered in by a human.
		* As alternative option, could have date be formatted as `mm-dd` if you wanted to publish the same action every year on `mm-dd`
	* `Last Published`: a string containing a date formatted as `mm-dd-yyyy`. Used as a reference to determine when an action was last published. Manually entered in by a human.

Pros
* Can set the exact day an action will be published through the `Publish On Date` field.
* Can easily see exactly when an action was last published
* More accurately reflects an action's last published date than Integrated Solution Approach

Cons
* Does not automatically cycle through all actions
	* Requires manually configuring when actions will be published
* `Last Published` and `Publish On Date` would need to be manually updated
* Problems could arise from human error:
	* If two actions have the same `Published On Date`, both actions will be published as posts. This would lead to undefined behavior.