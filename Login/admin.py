from django.contrib import admin
from .models import User
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
# Register your models here.
