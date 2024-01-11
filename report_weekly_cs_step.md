# How the Plugin Works and How it is used

The plugin is used to pull in a single record from the Actions database each week on Monday at 5:00 AM. The record selected is based off of the Publish on Date field. The record is then used to populate a weekly climate action post, which is then published to the website for users to view

### Selecting Where Data is Pulled From & What Data Is Pulled 
Essentially, the plugin uses an access token to access the Airtable tables you want to pull into Word Press. You can then specify the base, table, and view you wish to pull from.

By default, the plugin will pull in every record from the view you specified. The "Filter By Formula" option allows you to filter out additional entries which you may not want to pull from your selected view.

In our Weekly CS Steps prototype, the Filter By Formula field is used to filter out all records except for one: the record whose post date is scheduled for the week (`Post Date== TODAY()`).

![[Pasted image 20230813174458.png]]

<div style="page-break-after: always"></div>

### Specifying How Data Should Be Imported
Once it is specified where the data is coming from, Air WP Sync allows for you to specify how the data is imported: you can select who the author will be, choose to have the data be imported as either a post or page, and set the status of the post/page.

In our prototype, the data is imported as a draft post authored by myself.

![[Pasted image 20230813175713.png]]

<div style="page-break-after: always"></div>

### Specifying How Data Will Populate The Post or Page
Field mapping allows you to specify how each field will populate the post/page. Each row in this section contains two dropdowns that allow you to select an Airtable field (left-hand dropdown) and an import option (right-hand dropdown). This specifies how you would like the respective Airtable field imported into the post/page. For each record that is pulled from the table, a post/page will be created in the format you described through the field mapping.

For example, with our current prototype's settings (seen in the image below), if we were to pull all the data from the table below, there would be two new posts. One would have the title and category "Composting", and the post's content would be "Say yes to composting!"; the other would have the title and category "Biking Over Driving", and the post's content would be "Less gas used means less carbon emitted!".

![[Pasted image 20230813181222.png]]

| label_constant | Easy Climate Step of the Week (Climate Step the Day) |
| -- | --- |
| Composting | Say yes to composting! |
| Biking Over Driving | Less gas used means less carbon emitted! |

Unlike this example, however, our prototype makes all the values in the label_constant field the same: each one is "Weekly Climate Step". The reasoning behind this is to ensure that each time a Post is created and populated with the weekly climate step information, it has the same title and category. This ensures that the post can be automatically published to the website each week via searching for the post's category, which will always be "Weekly Climate Step".

<div style="page-break-after: always"></div>

### Sync Settings
Sync settings allow you to further customize how and when your data-created posts are published to WordPress. You can configure it so that posts are only able to be created; or, you can configure it so that old data-created posts will be updated if the information they depend on is changed; or, you can configure it so that data-created posts can be both created and updated, in addition to allowing Air WP Sync to delete posts whose corresponding data no longer exists.

How often data is pulled and posts are created, updated, and deleted depends on the trigger. A manual trigger ensures that these tasks are only performed when you manually click the "Sync Now" button. The Recurring trigger allows you to specify specific times for when data is pulled and posts are created, updated, and deleted.

In our prototype, Posts can be created, updated, and deleted. This ensures that, at any given time, there is only one "Weekly Climate Step" post. Additionally, the weekly climate step post is created on Mondays at 5:00 AM.

![[Pasted image 20230813184404.png]]

