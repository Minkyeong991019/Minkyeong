from django.contrib import admin
from .models import User,Category,Packet,Service,Tour_guide,Booking,Contacts,GroupService
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
	list_display = ['Name', 'Type','Decription','Image']
	list_filter = ['Name']
	search_fields = ['Name']
admin.site.register(Category, CategoryAdmin)
class ServiceAdmin(admin.ModelAdmin):
	list_display = ['Name','Decription']
	list_filter = ['Name']
	search_fields = ['Name']
admin.site.register(Service, ServiceAdmin)
class Tour_guideAdmin(admin.ModelAdmin):
	list_display = ['Name', 'Email','PhoneNumber', 'Decription','Status','Image']
	list_filter = ['Name']
	search_fields = ['Name']
admin.site.register(Tour_guide, Tour_guideAdmin)
class BookingAdmin(admin.ModelAdmin):
	list_display = ['Name','Time','UserID','PacketID','Status','Tour_guideID','Decription']
	list_filter = ['Name']
	search_fields = ['Name']
admin.site.register(Booking, BookingAdmin)
class ContactsAdmin(admin.ModelAdmin):
	list_display = ['Name', 'Email','PhoneNumber', 'Decription']
	list_filter = ['Name']
	search_fields = ['Name']
admin.site.register(Contacts, ContactsAdmin)
class GroupServiceAdmin(admin.ModelAdmin):
	list_display = ['BookingID', 'ServiceID']
	list_filter = ['BookingID']
	search_fields = ['BookingID__Name']
admin.site.register(GroupService, GroupServiceAdmin)
class PacketAdmin(admin.ModelAdmin):
	list_display = ['Name','Image','CategoryID','Decription']
	list_filter = ['Name']
admin.site.register(Packet, PacketAdmin)
