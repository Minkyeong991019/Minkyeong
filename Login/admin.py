from django.contrib import admin
from .models import User,Category,Packet,Service,Tour_guide,Booking,Contacts
from django.contrib.auth.admin import UserAdmin as BaseUserAdmin
from .forms import UserCreationForm
# Register your models here.
class UserAdmin(BaseUserAdmin):
	add_form = UserCreationForm
	list_display = ['username', 'first_name','last_name', 'PhoneNumber','Address']
	list_filter = ['username']
	search_fields = ['username']
	fieldsets = BaseUserAdmin.fieldsets  +(
		(None, {
			'fields': ('Address','PhoneNumber')
		}),
	)
admin.site.register(User, UserAdmin)
class CategoryAdmin(admin.ModelAdmin):
	list_display = ['Name', 'Type','Price','Decription']
	list_filter = ['Name']
	search_fields = ['Name']
admin.site.register(Category, CategoryAdmin)
class ServiceAdmin(admin.ModelAdmin):
	list_display = ['Name', 'PacketID','Decription']
	list_filter = ['Name']
	search_fields = ['Name']
admin.site.register(Service, ServiceAdmin)
class Tour_guideAdmin(admin.ModelAdmin):
	list_display = ['Name', 'Email','PhoneNumber','CategoryID', 'Decription','Status']
	list_filter = ['Name']
	search_fields = ['Name']
admin.site.register(Tour_guide, Tour_guideAdmin)
class BookingAdmin(admin.ModelAdmin):
	list_display = ['UserID', 'CategoryID','PacketID', 'ServiceID','Status']
	list_filter = ['UserID']
	search_fields = ['UserID']
admin.site.register(Booking, BookingAdmin)
class ContactsAdmin(admin.ModelAdmin):
	list_display = ['Name', 'Email','PhoneNumber', 'Decription']
	list_filter = ['Name']
	search_fields = ['Name']
admin.site.register(Contacts, ContactsAdmin)
