






document.addEventListener('DOMContentLoaded', function() {
    const app = new Application();
});


class Application {

    credentialList = this.findWithClass("credential_table").first();
    credentialItemTemplate = this.findWithClass('credential_item_template').first();
    emptyListAlert = this.findWithClass("empty_credential_alert") ;
    credentialTableLoading = this.findWithClass("table_loading");
    createCredentialBtn = this.findWithClass("new_credential_btn").first();
    credentialForm = this.findWithClass("credential_form").first();


    constructor() {
        console.log("application started");

        this.reloadTable().then(r => {

        });


        this.createCredentialBtn.click(() => {
            this.createCredentialForm();
        });

    }

    async reloadTable()
    {
        this.showLoading();
        await this.getCredentials().then(credentials => {
            let itemCount = credentials.length;
            if (itemCount)
            {
                this.emptyListAlert.hide();

                //disable loading
                this.credentialTableLoading.hide();
                //Show items in table
                credentials.forEach((credentialItem) => {
                    this.createNewCredentialItem(credentialItem);
                });

            }
            else {
                this.credentialList.empty();
                this.emptyListAlert.show();
            }
        })
    }

    findWithId(elementId)
    {
        return $("#" + elementId);
    }

    findWithClass(elementsClass)
    {
        return $("." + elementsClass);
    }


    async getCredentials()
    {
        return await axios.get('/api/credentials')
            .then(function (response) {
                if (response.data.status)
                    return response.data.data
            })
            .catch(function (error) {
                console.error(error);
            });
    }

    createNewCredentialItem(credential)
    {
        let credentialElement = this.credentialItemTemplate.clone();

        credentialElement.removeClass('credential_item_template');
        credentialElement.addClass('credential_item_' + credential.id);
        credentialElement.find('.credential_id').html(credential.id);
        credentialElement.find('.credential_name').html(credential.name);
        credentialElement.find('.credential_ip').html(credential.name);
        credentialElement.find('.credential_host').html(credential.name);
        credentialElement.find('.credential_username').html(credential.name);
        credentialElement.find('.credential_password').html(credential.name);
        credentialElement.show();

        this.credentialList.append(credentialElement);
    }

    showLoading()
    {
        this.emptyListAlert.hide();
        this.credentialTableLoading.show();
    }


    createCredentialForm()
    {
        let form = this.credentialForm.clone();
        $.confirm({
            title: 'Create new credential',
            content: form.html(),
            buttons: {
                confirm: function () {

                },
                cancel: function () {

                },
            }
        });
    }
}