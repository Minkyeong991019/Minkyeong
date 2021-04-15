from django.contrib.auth import get_user_model
from django.db.models import Q
from django import forms
from django.contrib.auth.forms import UserCreationForm

User = get_user_model()

class UserCreationForm(forms.ModelForm):
	password1 = forms.CharField(label='Password', widget=forms.PasswordInput)
	password2 = forms.CharField(label='Password confirmation', widget=forms.PasswordInput)
	class Meta:
		model = User
		fields = ['username', 'email']

	def clean_password(self):
		password1 = self.cleaned_data.get('password1')
		password2 = self.cleaned_data.get('password2')
		if password1 and password2 and password1 != password2:
			raise forms.ValidationError("Passwords do not match")
		return password2

	def save(self, commit=True):
		user = super(UserCreationForm, self).save(commit=False)
		user.set_password(self.cleaned_data['password1'])
		if commit:
			user.save()
		return user
class RegisterForm(UserCreationForm):
    class Meta:
    	model = User
    	fields = ["username", "email", "password1", "password2"]